<?php

namespace Webfactor\Laravel\Backpack\Documents\Controllers;

use Illuminate\Http\Request;
use Spatie\Fractalistic\ArraySerializer;
use Webfactor\Laravel\ApiController\ApiController;
use Webfactor\Laravel\Backpack\Documents\Transformers\DocumentTransformer;

class DocumentApiController extends ApiController
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
            return $this->respondNoEntries();
        }

        return $this->setResponsePayload([
            'documents' => fractal($documents, new DocumentTransformer(), new ArraySerializer())
        ])->respondWithSuccess();
    }
}
