<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $fillable=["facebook","google","youtube","twitter","profile_id",'linked_in'];

    public function profile()
    {
        return $this->belongsTo(Profile::class)->get()->first();
    }

}
