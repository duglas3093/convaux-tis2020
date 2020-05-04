<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->belongsToMany('ConvAux\User');
    }
}
