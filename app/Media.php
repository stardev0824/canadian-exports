<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable=[
        "logo","video","image_1","image_2","image_3","image_4","profile_id"
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class)->get()->first();
    }
}
