<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable=[
       "site" ,"location","too_free","email","langs","sales_department_email","employment_email","office_hours","phone","fax","facebook","twitter","linked_in","google","youtube"
    ];
}
