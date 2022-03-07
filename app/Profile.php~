<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=[
        "user_id","company_name","company_email","address","short_description","description","tag_line","key_word","site","phone","fax"
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->get()->first();
    }

    public function media(){
        return $this->hasOne(Media::class,"profile_id","id");
    }

    public function social_media(){
        return $this->hasOne(SocialMedia::class,"profile_id","id");
    }
}
