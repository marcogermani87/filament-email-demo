<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('demo:refresh', function () {
    $this->call('down');
    $this->components->task('Dropping all files and directories', function () {
        $path = storage_path('app/filament-email-log');
        $file = new Illuminate\Filesystem\Filesystem();
        return $file->cleanDirectory($path);
    });
    $this->call('migrate:fresh');
    $this->call('db:seed');
    $this->call('db:seed', [
        '--class' => 'EmailSeeder',
    ]);
    $this->call('up');
})->purpose('Prune and refresh all demo data')->hourly();
