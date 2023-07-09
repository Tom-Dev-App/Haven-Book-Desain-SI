<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table("transaction_statuses")->insert([
        //     "name" => "PENDING"
        // ]);
        DB::table('users')->insert([
            'name' => 'IlhamSoejudAlkahfiardy',
            'email' => '21081000005@student.unmer.ac.id',
            'password' => Hash::make('ilham123'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'AhmadThomthomiBarosimi',
            'email' => '21081000010@student.unmer.ac.id',
            'password' => Hash::make('tomi123'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'INengahCandraW',
            'email' => '21081000002@student.unmer.ac.id',
            'password' => Hash::make('candra123'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Rahmanda',
            'email' => '20081000017@student.unmer.ac.id',
            'password' => Hash::make('rahmanda123'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'Admin@localhost.com',
            'password' => Hash::make('admin123'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'AnnisaNurR',
            'email' => '21081000004@student.unmer.ac.id',
            'password' => Hash::make('nisa123'),
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'AriniElsa',
            'email' => '21081000006@student.unmer.ac.id',
            'password' => Hash::make('arini123'),
            'created_at' => now()
        ]);
    }
}
