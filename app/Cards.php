<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    protected $table = 'cards_show';

    protected $fillable = [
        'id',
        'deck_id',
        'font_family',
        'font_size',
        'text_align	',
        'color',
        'background_color',

    ];
   
    protected $searchableColumns = [
        'deck_id' => 20
    ];

    protected $dates = ['created_at', 'updated_at'];
}