<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    protected $table = 'knowledges';
    
    protected $fillable = [
        'description'
    ];

    public $timestamps = false;
}
