<?php

namespace Modules\Wings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WingsAllocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip', 'alias', 'port', 'node_id', 'allocation_id'
    ];
}
