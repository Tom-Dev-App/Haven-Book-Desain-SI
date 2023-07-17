<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionStatus extends Model
{
    use HasFactory;
    
    const PENDING = 1;
    const SUCCESS = 2;
    const CANCEL = 3;

    protected $fillable = ["name"];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
