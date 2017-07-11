<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phrases extends Model
{
    protected $fillable = ['english', 'vietnamese', 'alias', 'audio_slow', 'audio_normal', 'cat_phrase_id'];

    function categories_phrases() {
    	return $this->belongTo('App\Models\Categories_phrases');
    }
}
