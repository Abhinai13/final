<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    protected $casts = [
        'upvote' => 'boolean',
        'downvote' => 'boolean',

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }
}
