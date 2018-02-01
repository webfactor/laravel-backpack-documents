<?php

namespace Webfactor\LaravelBackpackDocuments\app\Http\Requests\app\Transformers;

use League\Fractal\TransformerAbstract;
use Webfactor\LaravelBackpackDocuments\app\Http\Requests\app\Models\Document;

class DocumentTransformer extends TransformerAbstract
{
    public function transform(Document $document)
    {
        return [
            'type' => $document->type,
            'title' => $document->title,
            'body' => $document->body
        ];
    }
}
