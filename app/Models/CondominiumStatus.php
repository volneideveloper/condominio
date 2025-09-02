<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CondominiumStatus extends Model
{
    protected $table = 'condominium_status';
    protected $fillable = ['name'];
}
