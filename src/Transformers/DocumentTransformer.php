<?php

namespace Webfactor\Laravel\Backpack\Documents\Transformers;

use League\Fractal\TransformerAbstract;
use Webfactor\Laravel\Backpack\Documents\Models\Document;

class DocumentTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['body'];

    public function transform(Document $document)
    {
        return [
            'type'      => $document->type,
            'title'     => $document->title,
            'updatedAt' => $document->updated_at->toIso8601String()
        ];
    }

    public function includeBody(Document $document) {
        $type = config('webfactor.documents.body_type');
        $options = config('webfactor.documents.transform_options.'.$type, []);
        $options = is_array($options)? $options : [$options];

        $body = $document->body;

        foreach($options as $option) {
            $body = method_exists($this, $option) ? $this->{$option}($body) : $body;
        }

        return $this->primitive($body);
    }

    // body transformations
    protected function single_line_breaks($body) {
        return str_replace("\r\n", "  \r\n", $body);
    }
}
