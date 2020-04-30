<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Decks;
use App\Fields;
use App\FieldsAndValue;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $decks = Decks::where('status', 1)->get();
        return view('dashboard', compact('decks'));
    }

    public function create()
    {
        return view('createDeck');
    }


    public function Add()
    {
        return view('addField');
    }

    public function store(Request $request)
    {
        //Model Validation
        // $this->validate($request, ['name' => 'unique:mst_goals,name']);
        // print_r($request->all());die;
        $decks = new Decks($request->all());
        $decks->status = 1;

        $decks->save();

        // flash()->success('Database was successfully created');

        return redirect('home/');
    }

    public function storeFieldForm(Request $request)
    {
        //Model Validation
        // $this->validate($request, ['name' => 'unique:mst_goals,name']);
        $req = $request->all();
        if (!empty($request->deck_id) && !empty($req)) {
            $fields = Fields::where('deck_id', $request->deck_id)->pluck('name', 'id');
            if (!empty($fields)) {

                $fields = $fields->toArray();
                // print_r($fields);die;
                $number_id = rand(1, 1000000);
                $array_new = [];
                foreach ($req as  $key => $value) {
                    // print_r($key);die;
                    if (array_key_exists($key, $fields)) {
                        $fields_nd_val = new FieldsAndValue();
                        $fields_nd_val->field_id = $key;
                        $fields_nd_val->value = $value;
                        $fields_nd_val->status = 1;
                        $fields_nd_val->number_id = $number_id;
                        $fields_nd_val->deck_id = $request->deck_id;
                        $fields_nd_val->save();
                    }
                }

                $deck = Decks::find($request->deck_id);
                $deck->total_count += 1;
                $deck->rem_count += 1;
                $deck->save();
            }
        } else {
            return Redirect::back()->withErrors(['msg', 'Add fields for this deck']);
        }



        // flash()->success('Database was successfully created');

        return redirect('home/');
    }

    public function edit($id)
    {
        $decks = Decks::find($id);

        return view('editDeck', compact('decks'));
    }

    public function update($id, Request $request)
    {
        $decks = Decks::find($id);

        $decks->update($request->all());
        $decks->save();
        //  flash()->success('Database details were successfully updated');

        return redirect('home/');
    }

    public function delete($id, Request $request)
    {

        //  flash()->success('Database details were successfully updated');

        DB::beginTransaction();
        $decks = Decks::findOrFail($id);
        $decks->status = 0;
        $decks->save();
        DB::commit();
        return redirect('home/');
    }



    public function getFields(Request $request)
    {
        $results = Fields::select('fields_desc.name', 'fields_desc.id')->where('fields_desc.deck_id', $request->deck_id)->get();

        echo json_encode($results);
        die;
    }
}
