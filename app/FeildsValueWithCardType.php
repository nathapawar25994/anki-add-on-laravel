<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeildsValueWithCardType extends Model
{
    protected $table = 'fields_value_with_card_type';

    protected $fillable = [
        'id',
        'field_id',
        'value',
        'status',
        'type',
        'card_type_id',
        'position',
        'deck_id',
        'number_id',

    ];
   
    protected $searchableColumns = [
        'value' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}