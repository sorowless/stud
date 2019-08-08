<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','FIO','phone','photo','birthdayDate',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'FIO' => 'string',
        'phone' => 'string',
        'photo' => 'string',
        'birthdayDate' => 'date',
        'password' => 'string',
        'remember_token' =>'string',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role','user_role','user_id','role_id');
    }
    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }
    public function hasRole($role){
        if($this->roles()->where('title',$role)->first()){
            return true;
        }
        return false;
    }

    public function isAdm() {
        return $this->roles()->where('title', 'admin')->exists();
    }
}
