<?php

namespace Webfactor\Laravel\Backpack\Documents\Transformers;

use League\Fractal\TransformerAbstract;
use Webfactor\LaravelBackpackDocuments\Models\Document;

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
