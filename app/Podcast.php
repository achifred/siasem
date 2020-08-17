<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    protected $fillable=['description','audio','author','category_id','likes','plays','cover_art'];
}
