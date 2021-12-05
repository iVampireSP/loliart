<?php

namespace Modules\Wings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PanelAccount extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function team()
    {
        return $this->belongsTo(\App\Models\Team::class);
    }
}