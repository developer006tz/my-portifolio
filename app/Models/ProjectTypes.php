<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];

    public function projects()
    {
        return $this->hasMany(Projects::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeWithProjects($query)
    {
        return $query->with('projects');
    }

    public function scopeWithProjectsCount($query)
    {
        return $query->withCount('projects');
    }

    public function scopeWithProjectsCountAndProjects($query)
    {
        return $query->withCount('projects')->with('projects');
    }



}
