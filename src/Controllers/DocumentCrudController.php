<?php

namespace Webfactor\Laravel\Backpack\Documents\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Webfactor\Laravel\Backpack\Documents\Requests\DocumentRequest as StoreRequest;
use Webfactor\Laravel\Backpack\Documents\Requests\DocumentUpdateRequest as UpdateRequest;

class DocumentCrudController extends CrudController
{
    protected $types = [
        'plaintext' => [
            'field' => 'textarea',
            'attrLabel' => 'textareaAttributes'
        ],
        'html'      => [
            'field' => 'summernote',
            'attrLabel' => 'options'
        ],
        'md'        => [
            'field' => 'simplemde',
            'attrLabel' => 'simplemdeAttributesRaw'
        ],
    ];

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel(config('webfactor.documents.model_class'));
        $this->crud->setRoute(config('webfactor.documents.backend.route_prefix') . '/' . config('webfactor.documents.backend.route'));
        $this->crud->setEntityNameStrings(trans('webfactor::documents.entity_name_singular'),
            trans('webfactor::documents.entity_name_plural'));

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        // ------ CRUD FIELDS

        $this->crud->addField([
            'name'            => 'type',
            'label'           => 'Dokumentenart',
            'type'            => 'select_from_array',
            'options'         => $this->getTypeOptions(),
            'allows_null'     => false,
            'allows_multiple' => false,
        ]);

        $this->crud->addField([
            'name'  => 'title',
            'label' => trans('webfactor::documents.title'),
        ]);

        $this->crud->addField([
            'name'                            => 'body',
            'label'                           => trans('webfactor::documents.body'),
            'type'                            => $this->bodyFieldType(),
            $this->bodyFieldAttributesLabel() => $this->bodyFieldAttributes(),
        ]);

        // ------ CRUD COLUMNS

        $this->crud->addColumns([
            [
                'name'  => 'translated_type',
                'label' => trans('webfactor::documents.type'),
            ],
            [
                'name'  => 'title',
                'label' => trans('webfactor::documents.title'),
            ],
            [
                'name'  => 'body',
                'label' => trans('webfactor::documents.body'),
            ],
        ]);

        // ------ CRUD BUTTONS

        // ------ CRUD ACCESS

        collect(config('webfactor.documents.access', []))->each(function ($enabled, $key) {
            if ($enabled) {
                $this->crud->allowAccess($key);
            } else {
                $this->crud->denyAccess($key);
            }
        });

        // ------ CRUD REORDER

        // ------ CRUD DETAILS ROW

        // ------ REVISIONS

        // ------ AJAX TABLE VIEW

        // ------ DATATABLE EXPORT BUTTONS

        // ------ ADVANCED QUERIES
    }

    public function getTypeOptions()
    {
        $types = collect(config('webfactor.documents.types'));

        return $types->mapWithKeys(function ($type) {
            return [$type => trans('webfactor::documents.types.' . $type)];
        });
    }

    public function bodyFieldType()
    {
        return $this->types[config('webfactor.documents.body_type', 'plaintext')]['field'];
    }

    public function bodyFieldAttributesLabel()
    {
        return $this->types[config('webfactor.documents.body_type', 'plaintext')]['attrLabel'];
    }

    public function bodyFieldAttributes()
    {
        $type = config('webfactor.documents.body_type', 'plaintext');
        return config('webfactor.documents.field_editor_attributes.'.$type, []);
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
