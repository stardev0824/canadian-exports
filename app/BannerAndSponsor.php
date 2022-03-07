<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerAndSponsor extends Model
{
    protected $table ="banners_and_sponsors";
    protected $fillable=["url","image","type"];
}
