<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table="users";

    protected $fillable = [
        'fb_id',
        'google_id',
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'role',
        'address',
        'city',
        'state',
        'postcode',
        'country_id',
        'birth_date',
        'parmanent_address',
        'active',
        'user_photo',
        'updated_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
