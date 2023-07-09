<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_has_role')->insert([
            'user_id' => 1,
            'role_id' => 2
        ]);

        DB::table('user_has_role')->insert([
            'user_id' => 2,
            'role_id' => 2
        ]);

        DB::table('user_has_role')->insert([
            'user_id' => 3,
            'role_id' => 3
        ]);

        DB::table('user_has_role')->insert([
            'user_id' => 4,
            'role_id' => 3
        ]);

        DB::table('user_has_role')->insert([
            'user_id' => 5,
            'role_id' => 1
        ]);

        DB::table('user_has_role')->insert([
            'user_id' => 6,
            'role_id' => 3
        ]);

        DB::table('user_has_role')->insert([
            'user_id' => 7,
            'role_id' => 3
        ]);
    }
}
