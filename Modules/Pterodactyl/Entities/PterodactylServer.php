<?php

namespace Modules\Pterodactyl\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PterodactylServer extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Pterodactyl\Database\factories\PterodactylServerFactory::new();
    }
}
