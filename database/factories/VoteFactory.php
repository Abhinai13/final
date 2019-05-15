<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Vote::class, function (Faker $faker) {
    return [
        //
        'upvote'=>$faker->boolean(),

        'downvote'=>$faker->boolean(),

    ];
});
