<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class AnnouncementRequest extends Model
{
    protected $table = 'requests';

    protected $fillable = [
        'assistant_amount', 'academic_hours', 'auxiliary_name', 'auxiliary_code', 'announcement_id'
    ];

    public $timestamps = false;
}
