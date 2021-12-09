<?php

namespace Modules\Wings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WingsNest extends Model
{
    use HasFactory;

    protected $fillable = [
        'nest_id', 'author', 'name', 'description'
    ];
}