<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\BookKey;
use App\Models\BookRent;
use App\Models\Transaction;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function rents()
    {
        return $this->hasMany(BookRent::class);
    }

    public function customerTransactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function employees()
    {
        return $this->hasMany(Transaction::class);
    }

    public function accountBank()
    {
        return $this->hasMany(BankAccount::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }
}
