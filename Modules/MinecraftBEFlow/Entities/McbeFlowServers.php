<?php

namespace Modules\MinecraftBEFlow\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class McbeFlowServers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'ip', 'port', 'start_x', 'start_z', 'end_x', 'end_z', 'token', 'status', 'team_id', 'motd'
    ];
}
