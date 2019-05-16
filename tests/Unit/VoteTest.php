<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testVote()
    {
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $question = factory(\App\Question::class)->make();
        $question->user()->associate($user);
        $question->save();
        $answer = factory(\App\Answer::class)->make();
        $answer->user()->associate($user);
        $answer->question()->associate($question);
        $answer->save();
        $user1 = $user = factory(\App\User::class)->make();
        $user1->save();
        $vote = factory(\App\Vote::class)->make();
        $vote->user()->associate($user1);
        $vote->answer()->associate($answer);
        $vote['upvote']=1;
        $vote['downvote']=0;
        $vote->save();
        $this->assertTrue($vote->save());
    }

    public function testUpvotecount()
    {
        $answer= \App\Answer::find(303);
        $this->assertTrue(is_object(\App\Vote::upvotecount($answer->id)->get()));
    }

}
