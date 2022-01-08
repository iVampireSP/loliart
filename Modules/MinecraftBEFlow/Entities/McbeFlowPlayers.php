<?php

namespace Modules\MinecraftBEFlow\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mcbeFlowPlayers extends Model
{
    use HasFactory;

    protected $fillable = [
        'xuid', 'name', 'user_id', 'nbt', 'server_id'
    ];
}
