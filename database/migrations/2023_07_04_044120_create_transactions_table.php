<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("transaction_number")->unique();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("book_id");
            $table->unsignedBigInteger("status_id");
            $table->unsignedBigInteger("admin_id");
            $table->unsignedBigInteger("bank_company_account_id");
            $table->unsignedBigInteger("bank_customer_account_id");
            $table->string("payment_proof");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("book_id")->references("id")->on("books")->onDelete("cascade");
            $table->foreign("status_id")->references("id")->on("transaction_statuses");
            $table->foreign("admin_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("bank_company_account_id")->references("id")->on("bank_accounts")->onDelete("cascade");
            $table->foreign("bank_customer_account_id")->references("id")->on("bank_accounts")->onDelete("cascade");
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
