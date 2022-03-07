<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';
    protected $fillable = [
        'program_name','length','tuition_canadian_students','tuition_international_students','program_url',
    ];
}
