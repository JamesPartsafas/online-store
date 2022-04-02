<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'password',
        'role',
    ];

    /**
     * Checks if user has admin priveleges.
     *
     * @return role
     */
    public function isAdmin() {
        return $this->role == 'admin';
    }
}
