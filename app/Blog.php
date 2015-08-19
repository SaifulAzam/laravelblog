<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Blog extends Model
{
    //
    protected $fillable = ['title', 'excerpt', 'content', 'published_at'];

    // public function setPublishedAtAttribute($date)
    // {
    //     $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    // }


    // http://laravel.io/forum/10-31-2014-undefined-property-clientname
    public function getPublishedAtAttribute()
 	{
 		$carbon = new Carbon($this->attributes['published_at']);
 		$date = $carbon->format('F j, Y');
 		return $date;
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
    	return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
