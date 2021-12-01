<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasRole extends Model
{
    use HasFactory;

    public function role()
    {
        return $this->hasOne(\Spatie\Permission\Models\Role::class, 'id', 'role_id');
    }
}
