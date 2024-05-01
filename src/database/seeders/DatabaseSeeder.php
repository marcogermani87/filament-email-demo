<?php

namespace Database\Seeders;

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
