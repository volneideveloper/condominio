<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'telefone',
        'is_active',
        'system_status_id',
        'profile_image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function systemStatus()
    {
        return $this->belongsTo(SystemStatus::class);
    }
}
