<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['tw_created_at', 'tw_id', 'tw_text', 'tw_source', 'tw_retweet_count', 'tw_favorite_count', 'tw_lang'];
    protected $dates = ['tw_created_at'];
}
