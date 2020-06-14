<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table = 'requirements';

    protected $fillable = [
        'description', 'announcement_id'
    ];

    public $timestamps = false;
}
