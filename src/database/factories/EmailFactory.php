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
        $attachments = [];
        $counter = $this->faker->numberBetween(0, 5);

        if ($counter > 0) {
            $savePath = 'filament-email-log' . DIRECTORY_SEPARATOR . date('YmdHis') . '_' . Str::random(8) . DIRECTORY_SEPARATOR;

            if (!file_exists($savePath)) {
                Storage::makeDirectory($savePath);
                chmod(storage_path('app' . DIRECTORY_SEPARATOR . $savePath), 755);
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
                chmod($storageFilePath, 755);
            }
        }

        return [
            'from' => $this->faker->email(),
            'to' => $this->faker->email(),
            'cc' => $this->faker->email(),
            'subject' => $this->faker->words(5, asText: true),
            'text_body' => $this->faker->paragraphs(asText: true),
            'html_body' => $this->faker->randomHtml(),
            'raw_body' => $this->faker->paragraphs(asText: true),
            'sent_debug_info' => $this->faker->paragraphs(asText: true),
            'attachments' => $attachments,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
