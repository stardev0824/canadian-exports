<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdsBanner extends Model
{
    protected $table = 'ads_banner';
    protected $fillable = [
        'image','url',
    ];
}
