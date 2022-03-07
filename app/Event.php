<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable =["start_at","end_at","title","venue","description","url","city","country"];
}
