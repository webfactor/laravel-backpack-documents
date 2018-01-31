<?php

namespace Webfactor\LaravelBackpackDocuments\app\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;

use Webfactor\LaravelBackpackDocuments\app\Http\Requests\DocumentRequest as StoreRequest;
use Webfactor\LaravelBackpackDocuments\app\Http\Requests\DocumentRequest as UpdateRequest;

class DocumentCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel(config('webfactor.documents.model_class'));
        $this->crud->setRoute(config('webfactor.documents.backend.route_prefix') .'/'.config('webfactor.documents.backend.route'));
        $this->crud->setEntityNameStrings(trans('webfactor:documents.document.singluar'), trans('webfactor:documents.document.plural'));

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setFromDb();

        // ------ CRUD FIELDS

        // ------ CRUD COLUMNS

        // ------ CRUD BUTTONS

        // ------ CRUD ACCESS

        // ------ CRUD REORDER

        // ------ CRUD DETAILS ROW

        // ------ REVISIONS

        // ------ AJAX TABLE VIEW

        // ------ DATATABLE EXPORT BUTTONS

        // ------ ADVANCED QUERIES

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
