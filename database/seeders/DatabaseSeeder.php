<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
        ]);

        $this->call([
            UserProfileSeeder::class
        ]);

        // $this->call([
        //     BookSeeder::class
        // ]);

        $this->call([
            BankSeeder::class
        ]);

        // $this->call([
        //     BankAccountSeeder::class
        // ]);

        $this->call([
            RoleSeeder::class
        ]);

        $this->call([
            UserHasRoleSeeder::class
        ]);

        $this->call([
            TransactionStatusSeeder::class,
        ]);

        // $this->call([
        //     TransactionSeeder::class
        // ]);
    }
}
