<?php

namespace ConvAux;

use Illuminate\Database\Eloquent\Model;

class AnnouncementDates extends Model
{
    protected $table = 'announcement_dates';

    protected $fillable = [
        'announcement_id', 'claims_location', 'claims_presentation', 'docs_location', 'docs_presentation',
        'phase_tests', 'publication_date', 'publication_of_enabled', 'publication_results'
    ];

    public $timestamps = false;
}
