<?php

namespace App\Broadcasting;

use App\Models\TeamUser;
use App\Models\User;

class TeamChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param User $user
     * @return array|bool
     */
    public function join(User $user)
    {
        return TeamUser::where('user_id', $user->id)->exists();
    }
}
