<?php

namespace App\Http\Controllers;

use Auth;
use App\Fields;
use Illuminate\Http\Request;

class FieldsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $fields = Fields::select('fields_desc.name','fields_desc.id','d.name as deck_name')->leftjoin('decks as d','d.id','=','fields_desc.deck_id')->get();
        $count = $fields->count();
        return view('fields.index', compact('fields', 'count'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    // public function show()
    // {
    //     $fields = Fields::findOrFail($id);

    //     return view('fields.show', compact('fields'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // print_r(0);die;
        return view('fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //Model Validation
      //  $this->validate($request, ['name' => 'unique:mst_goals,name']);

        $fields = new Fields($request->all());

        
        $fields->save();

        // flash()->success('Fields was successfully created');

        return redirect('fields/');
    }

    public function edit($id)
    {
        $fields = Fields::findOrFail($id);

        return view('fields.edit', compact('fields'));
    }

    public function update($id, Request $request)
    {
        $fields = Fields::findOrFail($id);

        $fields->update($request->all());
        $fields->save();
        // flash()->success('Fields details were successfully updated');

        return redirect('fields/');
    }

    public function delete($id)
    {
        Fields::destroy($id);

        return redirect('fields/');
    }
}
