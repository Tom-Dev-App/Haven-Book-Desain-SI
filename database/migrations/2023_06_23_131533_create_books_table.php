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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("image")->nullable();
            $table->string("slug")->unique();
            $table->string("title");
            $table->text("synopsis");
            $table->text("description");
            $table->string("author");
            $table->string("publisher");
            $table->unsignedInteger("release_year")->nullable();
            $table->string("file")->unique()->nullable();
            $table->float('price', 12, 2);
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->timestamp("release_date")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
