<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('demo:refresh', function () {
    $this->call('down');
    $this->components->task('Dropping all files and directories', function () {
        $path = storage_path('app/filament-email-log');
        $file = new Illuminate\Filesystem\Filesystem();
        return $file->cleanDirectory($path);
    });
    $this->call('migrate:fresh', [
        '--no-interaction',
    ]);
    $this->call('db:seed', [
        '--no-interaction',
    ]);
    $this->call('db:seed', [
        '--class' => 'EmailSeeder',
        '--no-interaction',
    ]);
    $this->call('up');
})->purpose('Prune and refresh all demo data')->hourly();
