<?php

namespace App;

use Kodeine\Acl\Traits\HasRole;
// use Kodeine\Acl\Traits\HasPermission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
// use Illuminate\Notifications\Notifiable;
// use App\Notifications\RegistrationNotice;
use App\Notifications\PasswordResetNotice;
use Illuminate\Support\Facades\Cache;


class User extends Authenticatable
{
    use Notifiable, CanResetPassword, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    // 'name', 'email', 'password', 'phone', 'otp_key', 'status', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $date =['deleted_at'];
    

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function getLogs()
    {
        return $this->hasMany('\App\ActivityLog', 'user_id', 'id')->where('status', 1)->orderBy('created_at', 'desc');
    }
    
    public function counselorData()
    {
        return $this->belongsTo('\App\Counselor', 'email', 'email');
    }
    public function pastorData()
    {
        return $this->belongsTo('\App\Pastor', 'email', 'email');
    }
    public function isOnline()
    {
        return Cache::has('user-online-'.$this->id);
    }

}
