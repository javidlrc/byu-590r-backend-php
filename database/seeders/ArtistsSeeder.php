<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Seeder;

class ArtistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artists = [
            [
                'genre_id' => 1,
                'name' => 'Kanye West',
                'description' => 'A highly influential rapper, producer, and fashion designer known for pushing boundaries in music and culture.',
                'favoriteSong' => 'Runaway',
                'favAlbum' => 'My Beautiful Dark Twisted Fantasy',
                'country' => 'United States',
                'file' => 'images/kanye.jpg',
                'checked_qty' => 5,
                'inventory_total_qty' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 2,
                'name' => 'The Beatles',
                'description' => 'One of the most legendary bands in history, pioneers of modern rock and pop music.',
                'favoriteSong' => 'Hey Jude',
                'favAlbum' => 'Abbey Road',
                'country' => 'United Kingdom',
                'file' => 'images/beatles.jpg',
                'checked_qty' => 4,
                'inventory_total_qty' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 3,
                'name' => 'Kendrick Lamar',
                'description' => 'A Pulitzer Prize-winning rapper known for his deep lyricism and social commentary.',
                'favoriteSong' => 'HUMBLE.',
                'favAlbum' => 'To Pimp a Butterfly',
                'country' => 'United States',
                'file' => 'images/kdot.jpg',
                'checked_qty' => 6,
                'inventory_total_qty' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 4,
                'name' => 'Michael Jackson',
                'description' => 'The King of Pop, a global icon known for his groundbreaking music and dance moves.',
                'favoriteSong' => 'Billie Jean',
                'favAlbum' => 'Thriller',
                'country' => 'United States',
                'file' => 'images/mj.jpg',
                'checked_qty' => 3,
                'inventory_total_qty' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 5,
                'name' => 'Lauryn Hill',
                'description' => 'A soulful artist blending hip-hop and R&B, known for her powerful lyrics and influence.',
                'favoriteSong' => 'Doo Wop (That Thing)',
                'favAlbum' => 'The Miseducation of Lauryn Hill',
                'country' => 'United States',
                'file' => 'images/lauren.jpg',
                'checked_qty' => 2,
                'inventory_total_qty' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 6,
                'name' => 'Bad Bunny',
                'description' => 'A global reggaeton and Latin trap sensation, revolutionizing Spanish-language music worldwide.',
                'favoriteSong' => 'Tití Me Preguntó',
                'favAlbum' => 'Un Verano Sin Ti',
                'country' => 'Puerto Rico',
                'file' => 'images/bb.jpg',
                'checked_qty' => 7,
                'inventory_total_qty' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genre_id' => 7,
                'name' => 'Bob Marley',
                'description' => 'A reggae legend known for his messages of peace, love, and unity.',
                'favoriteSong' => 'One Love',
                'favAlbum' => 'Legend',
                'country' => 'Jamaica',
                'file' => 'images/bob.jpg',
                'checked_qty' => 3,
                'inventory_total_qty' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Artist::insert($artists);
    }
}
