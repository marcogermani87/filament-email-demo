<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

Artisan::command('demo:install', function () {
    $this->call('down');
    $this->call('migrate', [
        '--force' => true,
    ]);
    Log::info("Executed artisan migrate --force", ['command' => $this->signature]);
    $this->call('db:seed', [
        '--force' => true,
    ]);
    Log::info("Executed artisan migrate:seed --force", ['command' => $this->signature]);
    $this->call('key:generate');
    Log::info("Executed artisan key:generate", ['command' => $this->signature]);
    $this->call('up');
    Log::info("Executed artisan up", ['command' => $this->signature]);
})->purpose('Install application');

Artisan::command('demo:refresh', function () {
    $this->call('down');
    Log::info("Executed artisan down", ['command' => $this->signature]);
    $this->components->task('Dropping all files and directories', function () {
        $path = storage_path('app/filament-email-log');
        $file = new Illuminate\Filesystem\Filesystem();
        return $file->cleanDirectory($path);
    });
    Log::info("Dropped all files and directories", ['command' => $this->signature]);
    $this->call('db:truncate', [
        'tables' => ['users', 'teams', 'team_user', 'filament_email_log'],
        '--checks' => false,
        '--force' => true,
    ]);
    Log::info("Executed artisan db:truncate users teams team_user filament_email_log --checks --force", ['command' => $this->signature]);
    $this->call('db:seed', [
        '--force' => true,
    ]);
    Log::info("Executed artisan migrate:seed --force", ['command' => $this->signature]);
    $this->call('up');
    Log::info("Executed artisan up", ['command' => $this->signature]);
})->purpose('Prune and refresh all demo data')->everyFifteenMinutes();
