<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class landingModel extends Model
{

    // Menentukan kolom yang bisa diisi (Mass Assignment)
    protected $table = 'landing_data';
    protected $fillable = [
        'flyer_image',
        'about_us_image',
        'architectur_image',
        'interior_image',
        'landscape_image',
        'renovation_image',
        'comercial_build_image',
        'about_us_desk1',
        'about_us_desk2',
        'architectur_desk',
        'interior_desk',
        'landscape_desk',
        'renovation_desk',
        'comercial_build_desk',
    ];
}
