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

        $localhost = User::create([
            'name' => 'Superadmin',
            'email' => 'Superadmin@localhost.com',
            'password' => Hash::make('superadmin'),
            'created_at' => now(),
            'role_id' => 1
        ]);

        $localhost->assignRole('superadmin');

        $ilham = User::create([
            'name' => 'IlhamSoejudAlkahfiardy',
            'email' => '21081000005@student.unmer.ac.id',
            'password' => Hash::make('ilham123'),
            'created_at' => now(),
            'role_id' => 1

        ]);

        $ilham->assignRole('superadmin');


        $tom = User::create([
            'name' => 'AhmadThomthomiBarosimi',
            'email' => '21081000010@student.unmer.ac.id',
            'password' => Hash::make('tomi123'),
            'created_at' => now(),
            'role_id' => 2
        ]);

        $tom->assignRole('admin');



        $candra = User::create([
            'name' => 'INengahCandraW',
            'email' => '21081000002@student.unmer.ac.id',
            'password' => Hash::make('candra123'),
            'created_at' => now(),
            'role_id' => 3
        ]);

        $candra->assignRole('user');


        $rahmanda = User::create([
            'name' => 'Rahmanda',
            'email' => '20081000017@student.unmer.ac.id',
            'password' => Hash::make('rahmanda123'),
            'created_at' => now(),
            'role_id' => 3
        ]);

        $rahmanda->assignRole('user');


        $nisa = User::create([
             'name' => 'AnnisaNurR',
            'email' => '21081000004@student.unmer.ac.id',
            'password' => Hash::make('nisa123'),
            'created_at' => now(),
            'role_id' => 3

        ]);

        $nisa->assignRole('user');


        $arini = User::create([
            'name' => 'AriniElsa',
            'email' => '21081000006@student.unmer.ac.id',
            'password' => Hash::make('arini123'),
            'created_at' => now(),
            'role_id' => 3
            
        ]);

        $arini->assignRole('user');

    }
}
