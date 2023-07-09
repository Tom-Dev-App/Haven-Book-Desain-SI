<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRent extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "book_id", "transaction_id", "due_date"];

    public function book (){
        return $this->belongsTo(Book::class, "book_id");
    }

    public function user () {
        return $this->belongTo(User::class, "user_id");
    }

    public function transaction () {
        return $this->belongTo(Transaction::class, "transaction_id");
    }
}
