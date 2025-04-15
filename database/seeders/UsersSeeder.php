<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Javier De Los Reyes',
                'email' => 'javierjrc55@hotmail.com',
                'email_verified_at' => null,
                'password' => bcrypt('donitas123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]

        ];
        User::insert($users);
}
}