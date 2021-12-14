<?php

namespace Modules\Wings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WingsServer extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function node() {
        return $this->belongsTo(WIngsNode::class, 'node_id', 'node_id');
    }
}
