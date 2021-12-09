<?php

namespace Modules\Wings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WingsNestEgg extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'nest_id', 'author', 'description', 'docker_image', 'docker_images', 'startup', 'egg_id', 'environment'
    ];

    protected $casts = [
        'environment' => 'array'
    ];
}