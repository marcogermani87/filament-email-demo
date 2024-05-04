<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;
use RickDBCN\FilamentEmail\Models\Email;

class EmailFactory extends Factory
{
    public function modelName(): string
    {
        return Email::class;
    }

    public function definition(): array
    {
        $cc = [];
        $bcc = [];
        $attachments = [];
        $chownUser = config('filament-email-demo.chown_user');
        $chmodPermissions = config('filament-email-demo.chmod_permissions');

        $ccCounter = $this->faker->numberBetween(1, 3);
        $bccCounter = $this->faker->numberBetween(1, 3);

        for ($i = 0; $i < $ccCounter; $i++) {
            $cc[] = $this->faker->safeEmail();
        }

        for ($i = 0; $i < $bccCounter; $i++) {
            $bcc[] = $this->faker->safeEmail();
        }

        $counter = $this->faker->numberBetween(0, 5);
        $counterWords = $this->faker->numberBetween(5, 10);

        if ($counter > 0) {
            $savePath = 'filament-email-log' . DIRECTORY_SEPARATOR . date('YmdHis') . '_' . Str::random(8) . DIRECTORY_SEPARATOR;

            if (!file_exists($savePath)) {
                Storage::makeDirectory($savePath);
                $storageSavePath = storage_path('app' . DIRECTORY_SEPARATOR . $savePath);
                chmod($storageSavePath, $chmodPermissions);
                chown($storageSavePath, $chownUser);
            }

            for ($i = 0; $i < $counter; $i++) {
                $fileName = Str::random(8) . '.pdf';
                $filePath = "{$savePath}{$fileName}";
                $storageFilePath = storage_path('app/' . $filePath);
                LaravelMpdf::loadHTML($this->faker->randomHtml())
                    ->save($storageFilePath);
                $attachments[] = [
                    'name' => $fileName,
                    'contentType' => 'application/pdf',
                    'path' => $filePath,
                ];
                chmod($storageFilePath, $chmodPermissions);
                chown($storageFilePath, $chownUser);
            }
        }

        $datetime = $this->faker->dateTime();

        return [
            'from' => $this->faker->safeEmail(),
            'to' => $this->faker->email(),
            'cc' => implode(',', $cc),
            'bcc' => implode(',', $bcc),
            'subject' => ucfirst($this->faker->words($counterWords, asText: true)),
            'text_body' => $this->faker->paragraphs(asText: true),
            'html_body' => $this->faker->randomHtml(),
            'raw_body' => $this->faker->paragraphs(asText: true),
            'sent_debug_info' => $this->faker->paragraphs(asText: true),
            'attachments' => $attachments,
            'created_at' => $datetime,
            'updated_at' => $datetime,
        ];
    }
}
