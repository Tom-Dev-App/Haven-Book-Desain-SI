<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("transaction_statuses")->insert([
            "name" => "PENDING"
        ]);

        DB::table("transaction_statuses")->insert([
            "name" => "SUCCESS"
        ]);

        DB::table("transaction_statuses")->insert([
            "name" => "CANCEL"
        ]);
    }
}
