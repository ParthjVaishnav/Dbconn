<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Change here
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Authenticatable // Change here
{
    use HasFactory, Notifiable;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'password', // Add if you're storing passwords here
        'remember_token',
    ];
}
