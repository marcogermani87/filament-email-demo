<?php

namespace Database\Seeders;

use App\Models\Email;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Email::factory()
            ->count(25)
            ->create();
    }
}
