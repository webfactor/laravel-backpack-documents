<?php

namespace Webfactor\Laravel\Backpack\Documents\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Fractalistic\ArraySerializer;

class DocumentApiController
{
    /**
     * Get all documents and return the json response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($lang = $request->input('lang')) {
            \App::setLocale($lang);
        }

        $model = config('webfactor.documents.model_class');

        $documents = $model::all();

        if (!$documents || !$documents->count()) {
            abort(422);
        }

        $transformerClass = config('webfactor.documents.api.transformer');

        return fractal($documents, new $transformerClass(), new ArraySerializer());
    }
}
