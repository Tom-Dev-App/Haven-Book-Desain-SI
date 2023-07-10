<?php

namespace App\Models;

use App\Models\Role as ModelsRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class UserhasRole extends Model
{

    protected $table = 'user_has_role';
    
    
    use HasFactory;
    const SUPERADMIN = 1;
    const ADMIN = 2;
    const USER = 3;

    protected $fillable = [
        'user_id',
        'role_id'
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }

    public function role()
    {
        return $this->belongsTo(ModelsRole::class);
    }
}
