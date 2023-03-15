<?php

namespace App\Models\Vehicles;

use App\Traits\HasSgcFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory;
    use HasSgcFile;
    
    protected $table = 'drivers';
    protected $fillable = [
        'file_no',
        'name_en',
        'name_ar',
        'license',
        'iqama',
        'notes',
        'driver_photo_path'
    ];

    protected $appends = [
        'driver_photo_url',
    ];
}
