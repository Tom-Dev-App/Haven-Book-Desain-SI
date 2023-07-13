<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["user_id", "bank_id", "account_number"];

    public function bank()
    {
        return $this->belongsTo(Bank::class, "bank_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function companyAccount()
    {
        $this->hasMany(Transaction::class);
    }

    public function customerAccount()
    {
        $this->hasMany(Transaction::class);
    }
}
