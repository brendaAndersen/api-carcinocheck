<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable {
    use HasFactory, Notifiable;
    use HasApiTokens; 
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'country',
        'document',
        'medical_license_number',
        'medical_institution',
        'address',
        'phone',
        'carcinocheck_id',

    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}