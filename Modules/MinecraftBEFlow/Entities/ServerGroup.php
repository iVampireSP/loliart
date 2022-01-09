<?php

namespace Modules\MinecraftBEFlow\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServerGroup extends Model
{
    use HasFactory;

    public $table = 'mcbe_flow_groups';

    protected $fillable = [];

}
