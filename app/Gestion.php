<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class Gestion extends Model
{
    protected $table = 'managements';
    
    protected $fillable = [
        'name', 'start_date', 'end_date', 'description'
    ];

    public $timestamps = false;
}
