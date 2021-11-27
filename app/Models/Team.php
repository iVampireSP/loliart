<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function users()
    {
        return $this->hasMany(TeamUser::class);
    }

    public function invitations()
    {
        return $this->hasMany(TeamInvitation::class);
    }
}