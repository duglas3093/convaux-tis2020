<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    protected $table = 'postulation';

    protected $fillable = [
        'postulation_status', 'allowed_student_id', 'announcement_id'
    ];

    public $timestamps = false;
}
