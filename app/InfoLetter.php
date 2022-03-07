<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoLetter extends Model
{
    protected $fillable=["name","email","company_name","country"];
}
