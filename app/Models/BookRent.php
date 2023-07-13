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
        return $this->belongsTo(User::class, "user_id");
    }

    public function transaction () {
        return $this->belongsTo(Transaction::class);
    }

    public function invoice() {
        return $this->belongsTo(Invoice::class, "invoice_id");
    }
}
