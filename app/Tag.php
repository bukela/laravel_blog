<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag'];
    
    public function posts() {
        return $this->belongsToMany('App\Post');
    }

    public function setTagAttribute($value) {
        $this->attributes['tag'] = ucwords($value);
    }
}
