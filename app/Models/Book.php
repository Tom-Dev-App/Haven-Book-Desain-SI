<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["image", "slug", "title", "synopsis", "description", "author", "author_attachment", "publisher", "publisher_attachment", "release_date", "release_year", "price", "is_used", "keys"];

    public function rents()
    {
        return $this->hasMany(BookRent::class);
    }
    
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
