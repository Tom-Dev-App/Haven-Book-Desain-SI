<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        "invoice_number", "transaction_id", ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function rents() {
        return $this->hasMany(BookRent::class);
    }
}
