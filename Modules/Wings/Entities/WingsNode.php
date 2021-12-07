<?php

namespace Modules\Wings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WingsNode extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function location()
    {
        return $this->belongsTo(WingsLocation::class);
    }
}
