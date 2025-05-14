<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'nup',
        'type',
        'brand',
        'license_plate',
        'chassis_number',
        'engine_number',
        'manufacture_year',
        'owner_name',
        'tax_due_date',
        'stnk_expired',
        'status'
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
