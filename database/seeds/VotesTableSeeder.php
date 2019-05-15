<?php

use App\Answer;
use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        for ($i = 1; $i <= 6; $i++) {
            $users->each(function ($user) {
                $answer = App\Answer::inRandomOrder()->first();
                $vote = factory(\App\Vote::class)->make();
                $vote->user()->associate($user);
                $vote->answer()->associate($answer);
                $vote->save();
            });
        }
    }
}
