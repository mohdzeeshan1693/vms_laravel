<?php

namespace App\Models\Vehicles;

use App\Models\Vehicles\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    protected $fillable = [
        'serial_no',
        'plate_no_en',
        'plate_no_ar',
        'chassis_number',
        'status',
        'brand_id',
        'model',
        'machine_type',
        'vehicle_type',
        'year',
        'project',
        'value',
        'owner',
        'owner_id',
        'color',
        'aswaq_no',
        'file_no',
        'driver_file_no',
        'notes',
        'working_status',
        'meter_type',
        'updated_by',
        'created_by',
    ];

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
