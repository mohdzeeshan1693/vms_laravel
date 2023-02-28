<?php

namespace App\Models\Vehicles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'project_id',
        'name_en',
        'name_ar',
        'created_by',
    ];

    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class, 'project_id');
    }
}
