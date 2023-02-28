<?php

namespace App\Models\Vehicles;

use App\Models\Vehicles\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SecondaryType extends Model
{
    use HasFactory;
    protected $table = 'secondary_types';
    protected $fillable = [
        'name_en',
        'name_ar',
        'created_by',
    ];

    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class, 'secondary_type_id');
    }
}
