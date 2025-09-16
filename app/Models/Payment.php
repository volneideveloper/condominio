<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'description',
        'amount',
        'payment_date',
        'due_date',
        'system_status_id',
        'user_id',
        'condominium_id',
        'payment_slip',
    ];

    public function systemStatus()
    {
        return $this->belongsTo(SystemStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }
}
