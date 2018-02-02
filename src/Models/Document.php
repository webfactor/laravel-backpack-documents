<?php

namespace Webfactor\Laravel\Backpack\Documents\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Webfactor\Laravel\Backpack\Documents\Models\Document
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $type
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $translated_type
 * @method static \Illuminate\Database\Eloquent\Builder|\Webfactor\Laravel\Backpack\Documents\Models\Document whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Webfactor\Laravel\Backpack\Documents\Models\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Webfactor\Laravel\Backpack\Documents\Models\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Webfactor\Laravel\Backpack\Documents\Models\Document whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Webfactor\Laravel\Backpack\Documents\Models\Document whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Webfactor\Laravel\Backpack\Documents\Models\Document whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Document extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
         'type',
         'title',
         'body'
     ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    public function getTranslatedTypeAttribute()
    {
        return trans('webfactor::documents.types.'.$this->type);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
