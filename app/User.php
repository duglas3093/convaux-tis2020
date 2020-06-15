<?php

namespace ConvAux;

use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    public function roles(){
        return $this->belongsToMany('ConvAux\Role');
    }
    
    //En caso de que un usuario no tenga un rol autorizados
    public function authorizeRoles($roles){
        if ($this->hasAnyRole($roles)) {
            return true;
        }else{
            return false;
        }
        // abort(401, 'This action is unauthorized');
    }
    //verifica si tiene uno o mas roles
    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
        
    }
    // verifica si el usuario tiene ese roll
    public function hasRole($role){
        if ($this->roles()->where('name',$role)->first()) {
            return true;
        }
        return false;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'ci', 'expedido','cod_sis', 'carrera', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
