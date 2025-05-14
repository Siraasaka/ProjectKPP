<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'borrower_name',
        'nip',
        'rank',
        'position',
        'work_unit',
        'address',
        'borrow_date',
        'return_date',
        'status',
        'purpose'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
