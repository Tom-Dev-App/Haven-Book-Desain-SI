<?php

namespace Database\Seeders;

use App\Models\TransactionStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            'transaction_number' => uniqid() . now(),
            'user_id' => 3,
            'book_id' => 1,
            'status_id' => 1,
            'admin_id' => 1,
            'bank_company_account_id' => 3,
            'bank_customer_account_id' => 1,
            'payment_proof' => 'coba transaksi 1',
            'created_at' => now()
        ]);

        DB::table('transactions')->insert([
            'transaction_number' => uniqid() . now(),
            'user_id' => 4,
            'book_id' => 2,
            'status_id' => 1,
            'admin_id' => 1,
            'bank_company_account_id' => 3,
            'bank_customer_account_id' => 2,
            'payment_proof' => 'coba transaksi 1',
            'created_at' => now()
        ]);

        DB::table('transactions')->insert([
            'transaction_number' => uniqid() . now(),
            'user_id' => 6,
            'book_id' => 3,
            'status_id' => 1,
            'admin_id' => 1,
            'bank_company_account_id' => 3,
            'bank_customer_account_id' => 5,
            'payment_proof' => 'coba transaksi 1',
            'created_at' => now()
        ]);

        DB::table('transactions')->insert([
            'transaction_number' => uniqid() . now(),
            'user_id' => 7,
            'book_id' => 4,
            'status_id' => 1,
            'admin_id' => 1,
            'bank_company_account_id' => 3,
            'bank_customer_account_id' => 6,
            'payment_proof' => 'coba transaksi 1',
            'created_at' => now()
        ]);
    }
}
