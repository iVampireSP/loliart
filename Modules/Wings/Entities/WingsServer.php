<?php

namespace Modules\Wings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WingsServer extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function node() {
        return $this->belongsTo(WingsNode::class, 'node_id', 'id');
    }

    public function account() {
        return $this->belongsTo(WingsPanelAccount::class, 'user_id', 'id');
    }
}
