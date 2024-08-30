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
        $to = [];
        $cc = [];
        $bcc = [];
        $attachments = [];
        $chownUser = config('filament-email-demo.chown_user');
        $chmodPermissions = config('filament-email-demo.chmod_permissions');
        $emailFactoryToMax = config('filament-email-demo.email_factory_to_max');
        $emailFactoryCcMax = config('filament-email-demo.email_factory_cc_max');
        $emailFactoryBccMax = config('filament-email-demo.email_factory_bcc_max');
        $emailFactoryAttachmentsMax = config('filament-email-demo.email_factory_attachments_max');

        $toCounter = $this->faker->numberBetween(1, $emailFactoryToMax);
        $ccCounter = $this->faker->numberBetween(0, $emailFactoryCcMax);
        $bccCounter = $this->faker->numberBetween(0, $emailFactoryBccMax);

        for ($i = 0; $i < $toCounter; $i++) {
            $to[] = $this->faker->safeEmail();
        }

        for ($i = 0; $i < $ccCounter; $i++) {
            $cc[] = $this->faker->safeEmail();
        }

        for ($i = 0; $i < $bccCounter; $i++) {
            $bcc[] = $this->faker->safeEmail();
        }

        $counter = $this->faker->numberBetween(0, $emailFactoryAttachmentsMax);
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

        $datetime = $this->faker->dateTimeBetween('-2 years');

        return [
            'from' => $this->faker->safeEmail(),
            'to' => implode(',', $to),
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
