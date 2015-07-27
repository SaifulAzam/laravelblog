<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // protected $fillable = array('name', 'content', 'blog_id');

    //      // many-to-one relationship with the Post model
    // public function blog()
    //      {
    //        return $this->belongsTo('Blog');
    //      }
}
