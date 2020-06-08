<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{    
    protected $table = 'announcements';

    protected $fillable = [
        'name', 'management_id', 'announcement_type_id', 'description', 'status'
    ];
}
