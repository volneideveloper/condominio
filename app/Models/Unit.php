<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'name',
        'condominium_id',
        'owner_id',
        'percentage',
    ];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
