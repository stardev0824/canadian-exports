<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable=["title","pdf","front_image","is_current_issue","pdf_original_name"];
}
