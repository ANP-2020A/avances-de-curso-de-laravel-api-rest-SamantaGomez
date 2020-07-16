<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($comment)
        {
            $comment->user_id = Auth::id();
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function article()
    {
        return $this->hasMany('App\Article');
    }
}
