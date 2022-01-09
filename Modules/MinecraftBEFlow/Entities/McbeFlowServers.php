<?php

namespace Modules\MinecraftBEFlow\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class McbeFlowServers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'ip', 'port', 'token', 'status', 'team_id', 'motd', 'group_id'
    ];
}
