<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CondominiumImage extends Model
{
    protected $fillable = ['condominium_id', 'image_path'];

    public function condominium() {
        return $this->belongsTo(Condominium::class);
    }
}
