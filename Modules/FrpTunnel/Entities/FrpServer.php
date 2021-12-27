<?php

namespace Modules\FrpTunnel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FrpServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'server_address', 'server_port', 'token', 'dashboard_port', 'dashboard_user', 'dashboard_password',
        'allow_http', 'allow_https', 'allow_tcp', 'allow_udp', 'allow_stcp', 'min_port', 'max_port', 'max_tunnels',
        'team_id'
    ];
}
