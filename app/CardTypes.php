<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardTypes extends Model
{
    protected $table = 'card_type';

    protected $fillable = [
        'id',
        'name',
        'status',
        'deck_id',
        'rem_count',
        'total_count',
    ];
    
    protected $searchableColumns = [
        'name' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}