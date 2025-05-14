<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'service_date',
        'description',
        'next_service_date'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
