<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnershipStatus extends Model
{
    use HasFactory;
    protected $table = 'ownership_statuses';
    protected $fillable = [
        'name_en',
        'name_ar',
        'created_by',
    ];

    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class, 'owner_status_id');
    }
}
