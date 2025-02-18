<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\projectModel as Project;

class projectVideo extends Model
{
    protected $table = 'project_videos';
    protected $fillable = [
        'project_id',
        'video'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
