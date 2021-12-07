<?php

namespace Modules\Wings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WingsLocation extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function nodes()
    {
        return $this->hasMany(WingsNode::class, 'location_id');
    }
}
