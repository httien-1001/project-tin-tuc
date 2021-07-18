<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id',
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
        foreach ($this->roles as $role){
            $permissions = $role->permissions;
            foreach ($permissions as $permission ){
                    $permission_name = $permission->route_name;
                    if(!in_array($permission_name,$array_permissions)){
                        array_push($array_permissions,$permission_name);
                    }
            }
        }
        return $array_permissions;
    }
    public function roles(){
        return $this->belongsToMany('\App\Models\Role','users_roles','user_id','role_id');
    }}
