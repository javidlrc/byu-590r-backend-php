<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Rap',
            'Pop',
            'Rock',
            'Reggae',
            'Latin',
            'Alternative',
            'Classic',
            'Indie',
        ];

        foreach ($genres as $name) {
            Genre::create(['name' => $name]);
        }
    }
}
