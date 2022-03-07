<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $fillable=["category","name","dead_line","country","value"];
}
