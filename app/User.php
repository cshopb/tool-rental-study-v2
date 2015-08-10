<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'role_id'];

    /**
     * A user can have many tools.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tools()
    {
        return $this->hasMany('App\Tool');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function rentedTool()
    {
        return $this->belongsToMany('App\Tool', 'tool_user_rent')->withPivot('rented_at','return_at')->withTimestamps();
    }

    public function isAManager()
    {
        $role = Auth::user()->role->name;

        if ($role == 'root' || $role == 'sudo')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isAdmin()
    {
        $role = Auth::user()->role->name;

        if ($role == 'root')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
