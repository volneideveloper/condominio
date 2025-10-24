<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condominium extends Model
{
    use HasFactory;
    
    protected $table = 'condominiums';

    protected $fillable = [
        'name',
        'address',
        'number',
        'complement',
        'uf',
        'zip_code',
        'city',
        'system_status_id',
        'condominium_image',
    ];

    public function systemStatus()
    {
        return $this->belongsTo(SystemStatus::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'imageable_id')->where('imageable_type', self::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
