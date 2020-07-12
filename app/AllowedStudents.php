<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class AllowedStudents extends Model
{
    protected $table = 'allowed_student';

    protected $fillable = [
        'postulation_code', 'sent_code_date', 'user_id'
    ];

    public $timestamps = false;
}
