<?php

namespace Database\Seeders;

use App\Models\Email;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Filament\Commands\MakeUserCommand;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $tenantEnabled = config('filament-email-demo.tenant_enabled');
        $emailFactoryCount = config('filament-email-demo.email_factory_count');

        $filamentMakeUserCommand = new MakeUserCommand();
        $reflector = new \ReflectionObject($filamentMakeUserCommand);

        $getUserModel = $reflector->getMethod('getUserModel');
        $getUserModel->setAccessible(true);

        $getUserModel->invoke($filamentMakeUserCommand)::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('123Stella@'),
        ]);

        if ($tenantEnabled) {
            $user = User::query()
                ->first()
                ->limit(1)
                ->get();

            $teams = Team::factory()
                ->count(2)
                ->create();

            foreach ($teams as $team) {
                $team->members()->attach($user[0]);
                $team->save();
                Email::factory()
                    ->count($emailFactoryCount)
                    ->create([
                        'team_id' => $team->id,
                    ]);
            }
        } else {
            Email::factory()
                ->count($emailFactoryCount)
                ->create();
        }
    }
}
