<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{
    protected $table = 'fields_desc';

    protected $fillable = [
        'id',
        'name',
        'status',
        'type',
        'deck_id',

    ];
   
    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}