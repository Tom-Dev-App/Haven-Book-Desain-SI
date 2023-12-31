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
        Schema::create('book_rents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("book_id");
            $table->unsignedBigInteger("invoice_id");
            $table->string("keys")->unique();
            $table->boolean("is_used")->default(false);
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("book_id")->references("id")->on("books")->onDelete("cascade");
            $table->foreign("invoice_id")->references("id")->on("invoices")->onDelete("cascade");
            $table->timestamp("due_date");
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_rents');
    }
};
