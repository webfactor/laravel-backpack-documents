<?php

return [

    // define the possible document types
    // each type can exist exactly one time in the database
    'types'             => [
        'imprint',
        'privacy',
        'sbt'
    ],

    // define the access to the documents (see backpack for more information)
    'access'            => [
        // can users list documents
        'list'   => true,
        'create' => false, // be sure to seed your documents if disabled
        'update' => true,
        'delete' => false,

        /* 'revisions', reorder', 'show', 'details_row' */
    ],

    // define the used body type.
    // possible values are:
    //  * plaintext
    //      -> will show a default html textfield as input and store plain text to the database
    //  * html
    //      -> will present the summernote rich text editor and store styled html to the database
    //  * md
    //      -> will present the simplemde markdown editor and store markdown to the database
    'body_type'         => 'md',

    // define additional field options here (see backpack for more information on this)
    'field_editor_attributes' => [
        'plaintext' => [],
        'html' => "",
        'md' => "'renderingConfig': {'singleLineBreaks': true}"
    ],

    // the model to use with this package
    // keep in mind: when changing the model, you most likely need to change the Transformer also
    'model_class'       => \Webfactor\Laravel\Backpack\Documents\Models\Document::class,

    // the transformer class used to transform the model for api responses
    'transformer_class' => \Webfactor\Laravel\Backpack\Documents\Transformers\DocumentTransformer::class,

    // define some options for the transformer
    // currently supported:
    //  * md
    //    -> single_line_breaks
    'transform_options' => [
        'md' => [
            'single_line_breaks'
        ]
    ],

    // customize your backend parameters
    'backend'           => [

        // the CRUD controller to be used
        'controller'   => Webfactor\Laravel\Backpack\Documents\Controllers\DocumentCrudController::class,

        // the route prefix for the default routes
        'route_prefix' => 'wfcms',

        // the route endpoint for the default routes
        'route'        => 'document',

        // the midlewares to use
        'middleware'   => ['web', 'admin']
    ],

    // customize the api
    'api'               => [

        // the API controller to be used
        'controller'   => Webfactor\Laravel\Backpack\Documents\Controllers\DocumentApiController::class,

        // the route prefix for the default routes
        'route_prefix' => 'api/v1',

        // the route endpoint for the default routes
        'route'        => 'documents',

        // the midlewares to use
        'middleware'   => ['apiv1']
    ]

];
