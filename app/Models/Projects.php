<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_types_id',
        'title',
        'image',
        'github',
        'url',
        'description',
        'technologies',
        'features',
        'challenges',
        'lessons',
    ];

    public function projectTypes()
    {
        return $this->belongsTo(ProjectTypes::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeWithProjectTypes($query)
    {
        return $query->with('projectTypes');
    }

    public function scopeWithProjectTypesCount($query)
    {
        return $query->withCount('projectTypes');
    }

    public function scopeWithProjectTypesCountAndProjectTypes($query)
    {
        return $query->withCount('projectTypes')->with('projectTypes');
    }
}
