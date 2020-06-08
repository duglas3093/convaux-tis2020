<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['name','description','image','url'];

    public function getRouteKeyName(){
        return 'slug';
    }
}
