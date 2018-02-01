<?php

use Illuminate\Database\Seeder;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(config('webfactor.documents.types'))->each(function ($type) {
            factory(\Webfactor\LaravelBackpackDocuments\app\Http\Requests\app\Models\Document::class)->create([
               'type' => $type
           ]);
        });
    }
}
