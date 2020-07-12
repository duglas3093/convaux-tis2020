<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class Merit extends Model
{
    protected $table = 'merits';

    protected $fillable = [
        'description'
    ];

    public $timestamps = false;
}
