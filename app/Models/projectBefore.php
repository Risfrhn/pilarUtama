<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\projectModel as Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class projectBefore extends Model
{
    use HasFactory;

    protected $table = 'project_befores';
    protected $fillable = [
        'project_id',
        'image'
    ];

    // Relasi ke proyek utama
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
