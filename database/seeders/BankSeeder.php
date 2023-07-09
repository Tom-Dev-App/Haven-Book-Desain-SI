<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banks')->insert([
            'name' => 'PT Bank Central Asia',
            'codename' => 'BCA'
        ]);

        DB::table('banks')->insert([
            'name' => 'PT Bank Negara Indonesia',
            'codename' => 'BNI'
        ]);

        DB::table('banks')->insert([
            'name' => 'PT Bank Republik Indonesia',
            'codename' => 'BRI'
        ]);
    }
}
