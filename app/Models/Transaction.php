<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ["transaction_number", "user_id", "book_id", "status_id", "admin_id", "bank_name_id", "cardholder_name", "card_number", "payment_proof", "bank_customer_account_id", "bank_company_account_id", 'rent_prices', 'months'];

    public function status()
    {
        return $this->belongsTo(TransactionStatus::class, "status_id");
    }

    public function book()
    {
        return $this->belongsTo(Book::class, "book_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function admin()
    {
        return $this->belongsTo(User::class, "admin_id");
    }

    public function customerBank()
    {
        return $this->belongsTo(BankAccount::class, "bank_customer_account_id");
    }

    public function companyBank()
    {
        return $this->belongsTo(BankAccount::class, "bank_company_account_id");
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
