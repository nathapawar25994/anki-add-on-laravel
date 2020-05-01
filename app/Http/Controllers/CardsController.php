<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cards;
use App\Fields;
use App\FieldsAndValue;

class CardsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $cards = Cards::select('cards_show.id','d.name as deck_name')->leftjoin('decks as d','d.id','=','cards_show.deck_id')->get();
        $count = $cards->count();
        return view('cards.index', compact('cards', 'count'));
    }

    public function create(Request $request)
    {
        return view('cards.create');
    }

    public function show($id)
    {
        $cards = Cards::find($id);
        // select('cards_show.*','f.name')->leftjoin('fields_desc as f','f.deck_id','=','cards_show.deck_id')->where('cards_show.id',$id)->first();

        $fields=FieldsAndValue::where('deck_id',$cards->deck_id)->get();
        // print_r($fields->toArray());die;

        return view('cards.show', compact('cards','fields'));
    }
    public function store(Request $request)
    {
        //Model Validation
      //  $this->validate($request, ['name' => 'unique:mst_goals,name']);

        $cards = new Cards($request->all());
        if(!empty($request->field_id)){
            
            FieldsAndValue::where('field_id', $request->field_id)->update(['position' =>1]);

            // print_r($request->field_id);die;
        }
        // print_r($request->all());die;
        $cards->save();

        // flash()->success('Fields was successfully created');

        return redirect('cards/');
    }

}
