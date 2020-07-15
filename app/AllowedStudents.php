<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class AllowedStudents extends Model
{
    // public function authCode($code){
    //     if($this->where('id', $roel)->first()){
    //         return true;
    //     }
    //     return false;
    // }

    protected $table = 'allowed_student';

    protected $fillable = [
        'postulation_code', 'sent_code_date', 'user_id'
    ];

    public $timestamps = false;
}
