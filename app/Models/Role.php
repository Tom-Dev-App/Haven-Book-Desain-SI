<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const SUPERADMIN = 1;
    const ADMIN = 2;
    const USER = 3;

    public function userhasrole()
    {
        return $this->belongsTo(UserhasRole::class);
    }
}
