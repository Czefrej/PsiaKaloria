<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, Billable;

    public const EMAIL_UNIQUE = 'UNIQUE';

    public const EMAIL_RECURRENT = 'RECURRENT';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany("App\Models\Order");
    }

    public function savedAddresses()
    {
        return $this->hasMany("App\Models\SavedAddress");
    }

    public static function createTemporary($login, $email)
    {
        if ($login == null) {
            $login = 'TEMP-'.substr(md5($email), -6);
        }

        $user = new User();
        $user->email = $email;
        $user->name = $login;
        $user->save();

        return $user;
    }

    public static function existsWithID($email)
    {
        $user = User::where('email', $email)->first();

        if ($user != null) {
            return $user;
        } else {
            return false;
        }
    }

    public static function isUniqueEmail(string $email)
    {
        $user = User::where('email', $email)->first();

        if ($user != null) {
            $user = User::where('email', $email)->where('email', 'not like', '%allegromail.pl')->where('password', null)->first();

            if ($user != null) {
                return User::EMAIL_RECURRENT;
            } else {
                return false;
            }
        } else {
            return User::EMAIL_UNIQUE;
        }
    }
}
