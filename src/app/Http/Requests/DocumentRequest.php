<?php

namespace Webfactor\LaravelBackpackDocuments\app\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class DocumentRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type'  => [
                'required',
                Rule::in(config('webfactor.documents.types')),
                Rule::unique('documents')
            ],
            'title' => 'required|min:5|max:255',
            'body'  => 'required|string'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'type' => trans('webfactor::documents.type'),
            'title' => trans('webfactor::documents.title'),
            'body' => trans('webfactor::documents.body')
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
