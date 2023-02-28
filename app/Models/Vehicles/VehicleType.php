<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;
    protected $table = 'vehicle_types';
    protected $fillable = [
        'name_en',
        'name_ar',
        'created_by',
    ];

    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_type_id');
    }
}
