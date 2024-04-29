<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Filament\Commands\MakeUserCommand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $filamentMakeUserCommand = new MakeUserCommand();
        $reflector = new \ReflectionObject($filamentMakeUserCommand);

        $getUserModel = $reflector->getMethod('getUserModel');
        $getUserModel->setAccessible(true);

        $getUserModel->invoke($filamentMakeUserCommand)::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('123Stella@'),
        ]);
    }
}
