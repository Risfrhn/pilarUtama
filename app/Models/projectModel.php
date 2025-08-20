<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class projectModel extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = [
        'name', 
        // 'title1', 
        'description1', 
        // 'title2', 
        'description2', 
        'jenis_projek', 
        'target_pengerjaan_start',
        'target_pengerjaan_end', 
        'status', 
        'gambarflyer',
        'gambarHero'
    ];

    // Relasi ke tabel project_befores
    public function befores()
    {
        return $this->hasMany(ProjectBefore::class);
    }

    // Relasi ke tabel project_afters
    public function afters()
    {
        return $this->hasMany(ProjectAfter::class);
    }

    // Relasi ke tabel project_videos
    public function videos()
    {
        return $this->hasMany(ProjectVideo::class);
    }
}
