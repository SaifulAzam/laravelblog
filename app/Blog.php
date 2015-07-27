<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Blog extends Eloquent
{

    protected $fillable = array('title', 'slug', 'content', 'user_id', 'published_at');

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>', Carbon::now());
    }
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }

    // public function getNumCommentsStr(){
    //     $num = $this->comments()->count();

    //     if($num == 1) {
    //         return "1 comment";
    //     }
    //     return $num. 'comments';
    // }
}
