<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'status',
    ];

    protected $hidden = [
        'password', // Hide the password by default
        'remember_token',
        'api_token', // You might want to hide this as well if it's sensitive
    ];

    public function getEmailAttribute($value)
    {
        return strtolower($value); // Ensure email is always lowercase
    }

    // Relationships, if any
}
