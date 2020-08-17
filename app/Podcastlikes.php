<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Podcastlikes extends Model
{
    protected $fillable =['user_id','podcast_id'];
}
