<?php

return [

    // define the possible document types
    // each type can exist exactly one time in the database
    'types' => [
        'imprint',
        'privacy',
        'sbt'
    ],

    // define the used body type.
    // possible values are:
    //  * plaintext
    //      -> will show a default html textfield as input and store plain text to the database
    //  * html
    //      -> will present the summernote rich text editor and store styled html to the database
    //  * md
    //      -> will present the simplemde markdown editor and store markdown to the database
    'body_type' => 'md',

    // the model to use with this package
    // keep in mind: when changing the model, you most likely need to change the Transformer also
    'model_class' => \Webfactor\LaravelBackpackDocuments\app\Http\Requests\app\Models\Document::class,

    // the transformer class used to transform the model for api responses
    'transformer_class' => \Webfactor\LaravelBackpackDocuments\app\Http\Requests\app\Transformers\DocumentTransformer::class,

    // customize your backend parameters
    'backend' => [

        // the CRUD controller to be used
        'controller' => Webfactor\LaravelBackpackDocuments\app\Http\Controllers\DocumentCrudController::class,

        // the route prefix for the default routes
        'route_prefix' => 'wfcms',

        // the route endpoint for the default routes
        'route' => 'document',

        // the midlewares to use
        'middleware' => ['web', 'admin']
    ],

    // customize the api
    'api' => [

        // the API controller to be used
        'controller' => Webfactor\LaravelBackpackDocuments\app\Http\Controllers\DocumentApiController::class,

        // the route prefix for the default routes
        'route_prefix' => 'api/v1',

        // the route endpoint for the default routes
        'route' => 'documents',

        // the midlewares to use
        'middleware' => ['apiv1']
    ]

];