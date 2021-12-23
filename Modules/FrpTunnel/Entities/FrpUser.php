<?php

namespace Modules\FrpTunnel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FrpUser extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\FrpTunnel\Database\factories\FrpUserFactory::new();
    }
}
