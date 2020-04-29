<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldsAndValue extends Model
{
    protected $table = 'fields_nd_value';

    protected $fillable = [
        'id',
        'field_id',
        'value',
        'status',
        'deck_id',
        'number_id',

    ];
   
    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}