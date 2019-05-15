<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Answer;
use App\User;
use App\Vote;
use App\Question;

use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upvote($answer)
    {
        $answer = Answer::find($answer);
        $Vote = new Vote();
        $Vote->upvote = 1;
        $Vote->downvote = 0;
        $Vote->user()->associate(Auth::user());
        $Vote->answer()->associate($answer);
        $Vote->save();
        return redirect()->back();
    }

    public function downvote($answer)
    {
        $answer = Answer::find($answer);
        $Vote = new Vote();
        $Vote->upvote = 0;
        $Vote->downvote = 1;
        $Vote->user()->associate(Auth::user());
        $Vote->answer()->associate($answer);
        $Vote->save();
        return redirect()->back();
    }


}
