<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property string photo
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','photo'
    ];
    /**
     * @var string
     */

    /**
     * @var string
     */

    public  function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }


    public function posts(){
        return $this->hasMany(Post::class, 'user_id');
    }

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
    ];

    public function  scopeAllowed($query){

        if (auth()->user()->can('view', $this)){

            $posts = $query;
        }else{
            $query->where('id', auth()->id());
        }
    }

    public function getRoleDisplay_Name(){
      return $this->roles->pluck('display_name')->implode(', ');
    }

}
