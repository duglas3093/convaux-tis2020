<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class KnowledgeDetail extends Model
{
    protected $table = 'knowledge_detail';

    protected $fillable = [
        'criteria', 'score', 'knowledge_id', 'request_id'
    ];

    public $timestamps = false;
}
