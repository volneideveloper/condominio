<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemStatus extends Model
{
    use HasFactory;

    protected $table = 'system_status';
    
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function condominiums()
    {
        return $this->hasMany(Condominium::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
