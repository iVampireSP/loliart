<?php

namespace App\Models;

use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function addBalance($amount, $user_id = false)
    {
        if (!$user_id) {
            $user = auth()->user();
        } else {
            $user = self::find($user_id);
        }
        $lock = Cache::lock("user_balance_" . $user->id, $user->balance);
        $lock->block(5);
        try {
            $user->balance += $amount;
            $user->save();
        } catch (LockTimeoutException $e) {
            unset($e);
            write('Unable to update user balance');
            return false;
        } finally {
            optional($lock)->release();
        }
        return true;
    }
}
