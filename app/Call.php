<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = ['name','description','image','url'];

    public function getRouteKeyName(){
        return 'slug';
    }
}
