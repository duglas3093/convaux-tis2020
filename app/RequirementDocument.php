<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class RequirementDocument extends Model
{
    protected $table = 'requirement_document';

    protected $fillable = [
        'document_path', 'postulant_id'
    ];

    public $timestamps = false;
}
