<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquery extends Model
{
    protected $fillable =['full_name','email','phone','subject','message'];
}
