<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'team_id'
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('user_id', auth()->id())->where('team_id', $value)->with('team')->firstOrFail();
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
