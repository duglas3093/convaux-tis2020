<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['carta_aux','kardex','certificado_estudiante','ci','certificado_biblioteca','curriculum','doc_resp_curriculum'];
}
