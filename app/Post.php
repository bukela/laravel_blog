<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title','content','category_id','featured','slug',
    ];

    protected $dates = ['deleted_at'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = ucwords($value);
    }

    public function getFeaturedAttribute($featured) {
        return asset($featured); //vraca full path do slike (http://valele.test...)
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
