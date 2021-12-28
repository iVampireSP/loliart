<?php

namespace Modules\FrpTunnel\Entities;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrpTunnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'protocol', 'custom_domain', 'local_address', 'remote_port', 'client_token',
        'sk', 'status', 'server_id', 'team_id',
    ];

    public function server() {
        return $this->belongsTo(FrpServer::class);
    }

    public function team() {
        return $this->belongsTo(Team::class);
    }

}
