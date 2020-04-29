<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decks extends Model
{
    protected $table = 'decks';

    protected $fillable = [
        'id',
        'name',
        'status',
    ];
   
    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}