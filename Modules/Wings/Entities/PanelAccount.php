<?php

namespace Modules\Wings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PanelAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'username', 'password', 'last_name', 'first_name'
    ];

    public function team()
    {
        return $this->belongsTo(\App\Models\Team::class);
    }
}