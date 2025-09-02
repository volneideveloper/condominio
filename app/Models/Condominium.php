<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condominium extends Model
{
    protected $fillable = [
        'name',
        'address',
        'number',
        'complement',
        'neighborhood',
        'zip_code',
        'city_id',
        'condominium_status_id',
    ];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function status() {
        return $this->belongsTo(CondominiumStatus::class, 'condominium_status_id');
    }

    public function images() {
        return $this->hasMany(CondominiumImage::class);
    }
}
