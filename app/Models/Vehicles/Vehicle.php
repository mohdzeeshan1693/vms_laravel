<?php

namespace App\Models\Vehicles;

use App\Models\Vehicles\Brand;
use App\Models\Vehicles\Project;
use App\Models\Vehicles\VehicleType;
use App\Models\Vehicles\SecondaryType;
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
        'vehicle_type_id',
        'secondary_type_id',
        'year',
        'project_id',
        'value',
        'owner',
        'owner_id',
        'color',
        'aswaq_no',
        'file_no',
        'driver_file_no',
        'notes',
        'working_status_id',
        'meter_type_id',
        'updated_by',
        'created_by',
    ];

    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function vehicle_types()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_type_id');
    }

    public function secondary_types()
    {
        return $this->belongsTo(SecondaryType::class, 'secondary_type_id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
