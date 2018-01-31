<?php

use Faker\Generator as Faker;

$factory->define(\Webfactor\LaravelBackpackDocuments\app\Http\Requests\app\Models\Document::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
        'body' => $faker->text,
        //'type' => $faker->randomElement(config('webfactor.documents.types'))
    ];
});
