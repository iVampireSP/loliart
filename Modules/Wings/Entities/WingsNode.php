<?php

namespace Modules\Wings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WingsNode extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location_id',
        'fqdn',
        'memory',
        'memory_overallocate',
        'disk',
        'disk_overallocate',
        'upload_size',
        'daemon_sftp',
        'daemon_listen',
        'behind_proxy',
        'visibility',
        'maintenance_mode',
    ];

    public function location()
    {
        return $this->belongsTo(WingsLocation::class);
    }
}
