<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public function hasPermission($route){
        $routes = $this ->routes();
        return in_array($route, $routes) ?  true : false;

    }
    public function routes(){
        $array_permissions = [];
        foreach ($this->getRoles as $role){
            $permissions = json_decode($role->permissions);
            foreach ($permissions as $per){
                if(!in_array($per,$array_permissions)){
                    array_push($array_permissions,$per);
                }
            }
        }
        return $array_permissions;
    }
    public function getRoles(){
        return $this->belongsToMany('\App\Models\Role','users_roles','user_id','role_id');
    }
}
