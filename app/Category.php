<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name_en","name_fr","slug"];

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class,"category_id","id");
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
