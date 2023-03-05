<?php

namespace App\Models\Vehicles;

use App\Models\Vehicles\Brand;
use App\Models\Vehicles\Color;
use App\Models\Vehicles\Project;
use App\Models\Vehicles\VehicleType;
use App\Models\Vehicles\SecondaryType;
use App\Models\Vehicles\WorkingStatus;
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
        'owner_id',
        'owner_id_no',
        'owner_status_id',
        'color_id',
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
        return $this->belongsTo(VehicleType::class, 'owner_status_id');
    }

    public function secondary_types()
    {
        return $this->belongsTo(SecondaryType::class, 'secondary_type_id');
    }

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function working_statuses()
    {
        return $this->belongsTo(WorkingStatus::class, 'working_status_id');
    }

    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function meter_types()
    {
        return $this->belongsTo(MeterType::class, 'meter_type_id');
    }

    public function ownerships()
    {
        return $this->belongsTo(Ownership::class, 'owner_id');
    }

    public function ownership_statuses()
    {
        return $this->belongsTo(OwnershipStatus::class, 'owner_id');
    }
}
