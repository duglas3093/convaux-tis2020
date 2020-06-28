<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class MeritDetail extends Model
{
    protected $table = 'merit_detail';

    protected $fillable = [
        'category', 'sub_category', 'criteria', 'score', 'merit_id'
    ];

    public $timestamps = false;
}
