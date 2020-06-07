<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{

    public function management() {
        return $this->hasOne(Gestion::class, 'id');
    }

    public function announcementType() {
        return $this->hasOne(ConvocatoriaTipo::class, 'id');
    }
    
    protected $table = 'announcements';

    protected $fillable = [
        'name', 'management_id', 'announcement_type_id', 'description', 'status'
    ];
}
