<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable=["name","place","category_id","comment"];

    public function category()
    {
        return $this->belongsTo(Category::class,"category_id","id","categories")
                    ->get()->first();
    }
}
