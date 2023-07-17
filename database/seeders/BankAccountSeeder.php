<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bank_accounts')->insert([
            'user_id' => 1,
            'bank_id' => 1,
            'account_number' => '21081000002'
        ]);

        DB::table('bank_accounts')->insert([
            'user_id' => 2,
            'bank_id' => 2,
            'account_number' => '20081000017'
        ]);

        DB::table('bank_accounts')->insert([
            'user_id' => 3,
            'bank_id' => 3,
            'account_number' => '21081000005'
        ]);

        DB::table('bank_accounts')->insert([
            'user_id' => 4,
            'bank_id' => 1,
            'account_number' => '21081000010'
        ]);

        DB::table('bank_accounts')->insert([
            'user_id' => 5,
            'bank_id' => 2,
            'account_number' => '21081000004'
        ]);

        DB::table('bank_accounts')->insert([
            'user_id' => 6,
            'bank_id' => 3,
            'account_number' => '21081000006'
        ]);

        DB::table('bank_accounts')->insert([
            'user_id' => 7,
            'bank_id' => 1,
            'account_number' => '21081000006'
        ]);
    }
}
