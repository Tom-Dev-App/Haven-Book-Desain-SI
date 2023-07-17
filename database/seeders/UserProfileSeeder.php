<?php

namespace Database\Seeders;

use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_profiles')->insert([
            'user_id' => 1,
            'first_name' => 'Local',
            'last_name' => 'Host',
            'created_at' => now(),
        ]);

        DB::table('user_profiles')->insert([
            'user_id' => 2,
            'first_name' => 'Ilham',
            'last_name' => 'Alkahfiardy',
            'created_at' => now(),
        ]);

        DB::table('user_profiles')->insert([
            'user_id' => 3,
            'first_name' => 'Ahmad',
            'last_name' => 'Barosimi',
            'created_at' => now(),
        ]);

        DB::table('user_profiles')->insert([
            'user_id' => 4,
            'first_name' => 'Candra',
            'last_name' => 'Wiryawan',
            'created_at' => now(),
        ]);

        DB::table('user_profiles')->insert([
            'user_id' => 5,
            'first_name' => 'Rahman',
            'created_at' => now(),
        ]);


        DB::table('user_profiles')->insert([
            'user_id' => 6,
            'first_name' => 'Annisa',
            'last_name' => 'Rahmawati',
            'created_at' => now(),
        ]);

        DB::table('user_profiles')->insert([
            'user_id' => 7,
            'first_name' => 'Arini',
            'last_name' => 'Azkaminnati',
            'created_at' => now(),
        ]);
    }
}
