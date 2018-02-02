<?php

use Faker\Generator as Faker;

$factory->define(\Webfactor\Laravel\Backpack\Documents\Models\Document::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
        'body' => $faker->text,
        //'type' => $faker->randomElement(config('webfactor.documents.types'))
    ];
});
