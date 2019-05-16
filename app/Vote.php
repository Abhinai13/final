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
    public static function upvotecount($answer)
    {
        return Vote::where(['upvote' => 1, 'answer_id'=> $answer])->count();
    }
    public static function downvotecount($answer)
    {
        return Vote::where(['downvote' => 1, 'answer_id'=> $answer])->count();

    }

}
