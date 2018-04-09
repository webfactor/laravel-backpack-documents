<?php

namespace Webfactor\Laravel\Backpack\Documents\Transformers;

use League\Fractal\TransformerAbstract;
use Webfactor\Laravel\Backpack\Documents\Models\Document;

class DocumentTransformer extends TransformerAbstract
{
    public function transform(Document $document)
    {
        return [
            'type'      => $document->type,
            'title'     => $document->title,
            'body'      => $document->body,
            'updatedAt' => $document->updated_at->toIso8601String()
        ];
    }
}
