<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

Artisan::command('demo:refresh', function () {
    $this->call('down');
    Log::info("Executed artisan down", ['command' => $this->signature]);
    $this->components->task('Dropping all files and directories', function () {
        $path = storage_path('app/filament-email-log');
        $file = new Illuminate\Filesystem\Filesystem();
        return $file->cleanDirectory($path);
    });
    Log::info("Dropped all files and directories", ['command' => $this->signature]);
    $this->call('migrate:fresh', [
        '--force' => true,
    ]);
    Log::info("Executed artisan migrate:fresh --force", ['command' => $this->signature]);
    $this->call('db:seed', [
        '--force' => true,
    ]);
    Log::info("Executed artisan migrate:seed --force", ['command' => $this->signature]);
    $this->call('up');
    Log::info("Executed artisan up", ['command' => $this->signature]);
})->purpose('Prune and refresh all demo data')->everyFifteenMinutes();
