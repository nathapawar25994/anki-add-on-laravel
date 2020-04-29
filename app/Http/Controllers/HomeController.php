<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Decks;

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
        $decks = Decks::where('status',1)->get();
        return view('dashboard', compact('decks'));
    }

    public function create()
    {
        return view('createDeck');
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
}
