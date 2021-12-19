<?php

namespace Modules\Wings\Entities;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WingsPanelAccount extends Model
{
    use HasFactory;

    protected $table = 'wings_panel_accounts';

    protected $fillable = [
        'email', 'username', 'password', 'last_name', 'first_name'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
