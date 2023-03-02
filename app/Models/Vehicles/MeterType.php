<?php

namespace App\Models\Vehicles;

use App\Models\Vehicles\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeterType extends Model
{
    use HasFactory;
    protected $table = 'meter_types';
    protected $fillable = [
        'name_en',
        'name_ar',
        'created_by',
    ];

    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class, 'meter_type_id');
    }
}
