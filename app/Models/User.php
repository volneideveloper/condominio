<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    const SUPER_ADMIN_ROLE = 'super_admin';
    const ADMIN_ROLE = 'admin';
    const APARTAMENT_MANAGER_ROLE = 'sindico';    
    const RESIDENT_ROLE = 'morador';


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

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function isSuperAdmin()
    {
        return $this->role === self::SUPER_ADMIN_ROLE;
    }
    
    public function isAdmin()
    {
        return $this->role === self::ADMIN_ROLE;
    }

    public function isApartamentManager()
    {
        return $this->role === self::APARTAMENT_MANAGER_ROLE;
    }

    public function isResident()
    {
        return $this->role === self::RESIDENT_ROLE;
    }

    public function units()
    {
        return $this->hasMany(Unit::class, 'owner_id');
    }
}
