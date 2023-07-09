<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = ["name", "codemane"];

    public function bankAccount() {
      return  $this->hasMany(BankAccount::class);
    }
}
