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

    public static function boot()
    {
        parent::boot();
        // here assign this team to a global user with global default role
        self::created(function ($model) {
            // get session team_id for restore it later
            $session_team_id = getPermissionsTeamId();
            // set actual new team_id to package instance
            setPermissionsTeamId($model);
            // get the admin user and assign roles/permissions on new team model
            User::find(auth()->id())->assignRole('Super Admin');
            // restore session team_id to package instance
            setPermissionsTeamId($session_team_id);
        });
    }
}