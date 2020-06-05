<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class ConvocatoriaTipo extends Model
{

    protected $table = 'announcement_type';
    protected $fillable = [
        'name', 'description'
    ];
    public $timestamps = false;
}
