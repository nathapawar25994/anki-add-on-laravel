<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Decks;
use App\Fields;
use App\FieldsAndValue;
use App\Cards;
use App\FeildsValueWithCardType;
use App\CardTypes;

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
        // print_r(env('APP_URL'));die;
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

        return redirect('home/')->with('success', 'Deck created successfully!');
    }

    public function storeFieldForm(Request $request)
    {
        //Model Validation
        // $this->validate($request, ['name' => 'unique:mst_goals,name']);
        $req = $request->all();
        // print_r($req['def_arr']);
        // die;
        if (!empty($request->deck_id) && !empty($req)) {
            $fields = Fields::where('deck_id', $request->deck_id)->pluck('name', 'id');
            if (!empty($fields)) {

                $fields = $fields->toArray();
                // print_r($fields);die;
                $number_id = rand(1, 1000000);
                $array_new = [];
                foreach ($req as  $key => $value) {
                    // print_r($key);die;<audio controls="" src="blob:http://localhost/8d59f0af-a72a-48c0-8731-8df35a7a4048"></audio>/var/www/html/Anki-search/public/assets/audio
                    if (array_key_exists($key, $fields)) {
                        if ($key == 9) {
                            $fields_nd_val = new FieldsAndValue();
                            $fields_nd_val->field_id = $key;
                            // print_r($value);
                            $fields_nd_val->value = '<audio class="audio_card"    id="audio_record" controls="" src = \'http://localhost/Anki-search/public/assets/audio/' . $value . '\'  ></audio>';
                            $fields_nd_val->status = 1;
                            $fields_nd_val->number_id = $number_id;
                            $fields_nd_val->deck_id = $request->deck_id;

                            $fields_nd_val->save();
                        } elseif ($key == 10) {
                            $fields_nd_val = new FieldsAndValue();
                            $fields_nd_val->field_id = $key;
                            $fields_nd_val->value = '<audio class="audio_card"    id="audio_record" controls="" src = \'http://localhost/Anki-search/public/assets/audio/' . $value . '\'  ></audio>';
                            $fields_nd_val->status = 1;
                            $fields_nd_val->number_id = $number_id;
                            $fields_nd_val->deck_id = $request->deck_id;
                            $fields_nd_val->save();
                        } else {
                            $fields_nd_val = new FieldsAndValue();
                            $fields_nd_val->field_id = $key;
                            $fields_nd_val->value = $value;
                            $fields_nd_val->status = 1;
                            $fields_nd_val->number_id = $number_id;
                            $fields_nd_val->deck_id = $request->deck_id;
                            $fields_nd_val->save();
                        }
                    } elseif ($key == 'images') {

                        foreach ($req['images'] as  $key => $value) {

                            $fields_nd_val = new FieldsAndValue();
                            $fields_nd_val->field_id = 8;
                            $style = 'height: 100px; width: 100px; padding-right: 20px;';
                            $fields_nd_val->value = '<img src = \'' . $value . '\' style =\'' . $style . '\' >';


                            //   print_r( $fields_nd_val->value);die;
                            $fields_nd_val->status = 1;
                            $fields_nd_val->number_id = $number_id;
                            $fields_nd_val->deck_id = $request->deck_id;
                            $fields_nd_val->save();
                        }
                    } else {
                        if ($key == 'active_word_card' && !empty($value)) {

                            $number_id = rand(1, 1000000);
                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 2;
                            $active_word_card->card_type_id = 1;
                            $active_word_card->value = "<br>" . '<span style="color:blue;-webkit-text-stroke-width: medium;text-align:Center" >'.$req[2].'</span>';
                            $active_word_card->type = 1;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 1;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();
                            if (!empty($req['images'])) {
                                foreach ($req['images'] as  $key => $value) {
                                    $active_word_card = new FeildsValueWithCardType();
                                    $active_word_card->field_id = 8;
                                    $active_word_card->card_type_id = 1;
                                    $style = 'height: 100px; width: 100px; padding-right: 20px;';
                                    $active_word_card->value = "<br>" . '<img src = \'' . $value . '\' style =\'' . $style . '\' >';

                                    $active_word_card->type = 1;
                                    $active_word_card->deck_id = $request->deck_id;
                                    $active_word_card->position = 2;
                                    $active_word_card->number_id = $number_id;
                                    $active_word_card->status = 1;
                                    $active_word_card->save();
                                }
                            }


                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 6;
                            $active_word_card->card_type_id = 1;
                            $active_word_card->value = "<br>" .'<span style="color:red;text-align:Center" >'. $req[6].'</span>';
                            $active_word_card->type = 1;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 3;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            if (!empty($req['def_arr'])) {
                                $i=1;
                                foreach ($req['def_arr'] as  $key => $value) {

                                    $value = str_replace($req[4], '____', $value); 

                                    $active_word_card = new FeildsValueWithCardType();
                                    $active_word_card->field_id = 7;
                                    $active_word_card->value = "<br>" .'<span style="color:#581e3e;font-style: italic;text-align:Center" >'.$i .'.'. $value .'</span>';
                                    $active_word_card->card_type_id = 1;
                                    $active_word_card->type = 1;
                                    $active_word_card->deck_id = $request->deck_id;
                                    $active_word_card->position = 4;
                                    $active_word_card->number_id = $number_id;
                                    $active_word_card->status = 1;
                                    $active_word_card->save();
                                    $i++;
                                }
                            }



                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 4;
                            $active_word_card->card_type_id = 1;
                            $active_word_card->value = "<br>" .'<span style="color:black;text-decoration: underline;text-align:Center" >'. $req[4].'</span>';
                            $active_word_card->type = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 1;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();


                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 5;
                            $active_word_card->card_type_id = 1;
                            $active_word_card->value = "<br>" .'<span style="color:red;text-align:Center" >'. $req[5].'</span>';
                            $active_word_card->type = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 2;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 9;
                            $active_word_card->card_type_id = 1;
                            $active_word_card->value = "<br>" . '<audio class="audio_card"     id="audio_record" controls="" src = \'http://localhost/Anki-search/public/assets/audio/' . $req[9] . '\'  ></audio>';
                            $active_word_card->type = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 3;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 1;
                            $active_word_card->value = "<br>" .'<span style="color:blue;-webkit-text-stroke-width: medium;text-align:Center" >'. $req[1].'</span>';
                            $active_word_card->card_type_id = 1;
                            $active_word_card->type = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 4;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 10;
                            $active_word_card->card_type_id = 1;
                            $active_word_card->value = "<br>" . '<audio class="audio_card"     id="audio_record" controls="" src = \'http://localhost/Anki-search/public/assets/audio/' . $req[10] . '\'  ></audio>';
                            $active_word_card->type = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 5;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();
                        } elseif ($key == 'active_word_sentence_card' && !empty($value)) {

                            $number_id = rand(1, 1000000);
                            $active_word_sentence_card = new FeildsValueWithCardType();
                            $active_word_sentence_card->field_id = 4;
                            $active_word_sentence_card->value = "<br>" .'<span style="color:black;text-decoration: underline;text-align:Center" >'. $req[4].'</span>';
                            $active_word_sentence_card->card_type_id = 4;
                            $active_word_sentence_card->type = 1;
                            $active_word_sentence_card->deck_id = $request->deck_id;
                            $active_word_sentence_card->position = 1;
                            $active_word_sentence_card->number_id = $number_id;
                            $active_word_sentence_card->status = 1;
                            $active_word_sentence_card->save();
                            //    print_r();die;
                            if (!empty($req['images'])) {
                                $i = 1;
                                foreach ($req['images'] as  $key => $value) {

                                    if ($i == 1) {
                                        $active_word_card = new FeildsValueWithCardType();
                                        $active_word_card->field_id = 8;
                                        $active_word_card->card_type_id = 4;
                                        $style = 'height: 100px; width: 100px; padding-right: 20px;';
                                        $active_word_card->value = "<br>" . '<img src = \'' . $value . '\' style =\'' . $style . '\' >';
                                        $active_word_card->type = 1;
                                        $active_word_card->deck_id = $request->deck_id;
                                        $active_word_card->position = 5;
                                        $active_word_card->number_id = $number_id;
                                        $active_word_card->status = 1;
                                        $active_word_card->save();
                                        $i += 1;
                                    } else {
                                        $active_word_card = new FeildsValueWithCardType();
                                        $active_word_card->field_id = 8;
                                        $active_word_card->card_type_id = 4;
                                        $style = 'height: 100px; width: 100px; padding-right: 20px;';
                                        $active_word_card->value = "<br>" . '<img src = \'' . $value . '\' style =\'' . $style . '\' >';
                                        $active_word_card->type = 2;
                                        $active_word_card->deck_id = $request->deck_id;
                                        $active_word_card->position = 5;
                                        $active_word_card->number_id = $number_id;
                                        $active_word_card->status = 1;
                                        $active_word_card->save();
                                    }
                                }
                            }

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 9;
                            $active_word_card->card_type_id = 4;
                            $active_word_card->value = "<br>" . '<audio class="audio_card"     id="audio_record" controls="" src = \'http://localhost/Anki-search/public/assets/audio/' . $req[9] . '\'  ></audio>';
                            $active_word_card->type = 1;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 2;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 6;
                            $active_word_card->value = "<br>" .'<span style="color:red;text-align:Center" >'. $req[6].'</span>';
                            $active_word_card->card_type_id = 4;
                            $active_word_card->type = 1;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 3;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            if (!empty($req['def_arr'])) {
                                $i=1;
                                foreach ($req['def_arr'] as  $key => $value) {
                                    $value = str_replace($req[4], '____', $value); 
                                    $active_word_card = new FeildsValueWithCardType();
                                    $active_word_card->field_id = 7;
                                    $active_word_card->value = "<br>" . '<span style="color:#581e3e;font-style: italic;text-align:Center" >'.$i.'.'.$value.'</span>';
                                    $active_word_card->card_type_id = 4;
                                    $active_word_card->type = 1;
                                    $active_word_card->deck_id = $request->deck_id;
                                    $active_word_card->position = 5;
                                    $active_word_card->number_id = $number_id;
                                    $active_word_card->status = 1;
                                    $active_word_card->save();
                                    $i++;
                                }
                            }



                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 1;
                            $active_word_card->value = "<br>" .'<span style="color:blue;-webkit-text-stroke-width: medium;text-align:Center" >'. $req[1].'</span>';
                            $active_word_card->card_type_id = 4;
                            $active_word_card->type = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 1;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 9;
                            $active_word_card->value = "<br>" . '<audio     id="audio_record" class="audio_card"     id="audio_record" controls="" src = \'http://localhost/Anki-search/public/assets/audio/' . $req[9] . '\'  ></audio>';
                            $active_word_card->card_type_id = 4;
                            $active_word_card->type = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 3;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 4;
                            $active_word_card->value = "<br>" .'<span style="color:black;text-decoration: underline;text-align:Center" >'. $req[4].'</span>';
                            $active_word_card->card_type_id = 4;
                            $active_word_card->type = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 2;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 5;
                            $active_word_card->value = "<br>" .'<span style="color:red;text-align:Center" >'. $req[5].'</span>';
                            $active_word_card->card_type_id = 4;
                            $active_word_card->type = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 4;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();
                        } elseif ($key == 'active_picture_word_card' && !empty($value)) {
                            $number_id = rand(1, 1000000);
                            $active_word_sentence_card = new FeildsValueWithCardType();
                            $active_word_sentence_card->field_id = 4;
                            $active_word_sentence_card->value = "<br>" .'<span style="color:black;text-decoration: underline;text-align:Center" >'. $req[4].'</span>';
                            $active_word_sentence_card->card_type_id = 2;
                            $active_word_sentence_card->type = 2;
                            $active_word_sentence_card->deck_id = $request->deck_id;
                            $active_word_sentence_card->position = 1;
                            $active_word_sentence_card->number_id = $number_id;
                            $active_word_sentence_card->status = 1;
                            $active_word_sentence_card->save();
                            if (!empty($req['images'])) {
                                $i = 1;
                                foreach ($req['images'] as  $key => $value) {
                                    if ($i == 1) {
                                        $active_word_card = new FeildsValueWithCardType();
                                        $active_word_card->field_id = 8;
                                        $style = 'height: 100px; width: 100px; padding-right: 20px;';
                                        $active_word_card->value = "<br>" . '<img src = \'' . $value . '\' style =\'' . $style . '\' >';

                                        $active_word_card->type = 1;
                                        $active_word_card->card_type_id = 2;
                                        $active_word_card->deck_id = $request->deck_id;
                                        $active_word_card->position = 1;
                                        $active_word_card->number_id = $number_id;
                                        $active_word_card->status = 1;
                                        $active_word_card->save();
                                        $i += 1;
                                    } else {
                                        $active_word_card = new FeildsValueWithCardType();
                                        $active_word_card->field_id = 8;
                                        $style = 'height: 100px; width: 100px; padding-right: 20px;';
                                        $active_word_card->value = "<br>" . '<img src = \'' . $value . '\' style =\'' . $style . '\' >';

                                        $active_word_card->type = 2;
                                        $active_word_card->card_type_id = 2;
                                        $active_word_card->deck_id = $request->deck_id;
                                        $active_word_card->position = 1;
                                        $active_word_card->number_id = $number_id;
                                        $active_word_card->status = 1;
                                        $active_word_card->save();
                                    }
                                }
                            }





                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 9;
                            $active_word_card->value = "<br>" . '<audio     id="audio_record" class="audio_card" controls="" src = \'http://localhost/Anki-search/public/assets/audio/' . $req[9] . '\'  ></audio>';
                            $active_word_card->type = 2;
                            $active_word_card->card_type_id = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 3;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();



                            if (!empty($req['def_arr'])) {
                                $i=1;
                                foreach ($req['def_arr'] as  $key => $value) {
                                    $value = str_replace($req[4], '____', $value); 
                                    $active_word_card = new FeildsValueWithCardType();
                                    $active_word_card->field_id = 7;
                                    $active_word_card->value = "<br>" . '<span style="color:#581e3e;font-style: italic;text-align:Center" >'.$i.'.'. $value.'</span>';
                                    $active_word_card->type = 1;
                                    $active_word_card->card_type_id = 2;
                                    $active_word_card->deck_id = $request->deck_id;
                                    $active_word_card->position = 3;
                                    $active_word_card->number_id = $number_id;
                                    $active_word_card->status = 1;
                                    $active_word_card->save();
                                    $i++;

                                }
                            }
                          

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 1;
                            $active_word_card->value = "<br>" .'<span style="color:blue;-webkit-text-stroke-width: medium;text-align:Center" >'. $req[1].'</span>';
                            $active_word_card->type = 2;
                            $active_word_card->card_type_id = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 4;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 6;
                            $active_word_card->value = "<br>" .'<span style="color:red;text-align:Center" >'. $req[6].'</span>';
                            $active_word_card->type = 1;
                            $active_word_card->card_type_id = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 2;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();


                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 5;
                            $active_word_card->value = "<br>" .'<span style="color:red;text-align:Center" >'. $req[5].'</span>';
                            $active_word_card->type = 2;
                            $active_word_card->card_type_id = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 2;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 10;
                            $active_word_card->value = "<br>" . '<audio     id="audio_record" class="audio_card" controls="" src = \'http://localhost/Anki-search/public/assets/audio/' . $req[10] . '\'  ></audio>';
                            $active_word_card->type = 2;
                            $active_word_card->card_type_id = 2;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 5;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();
                        } elseif ($key == 'active_listening_reading_card' && !empty($value)) {
                            $number_id = rand(1, 1000000);




                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 10;
                            $active_word_card->value = "<br>" . '<audio id="audio_record" allow=”autoplay” autoplay="autoplay"  class="audio_card" controls="" src = \'http://localhost/Anki-search/public/assets/audio/' . $req[10] . '\'  ></audio>';
                            $active_word_card->type = 1;
                            $active_word_card->card_type_id = 7;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 3;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();




                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 1;
                            $active_word_card->value = "<br>" .'<span style="color:blue;-webkit-text-stroke-width: medium;text-align:Center" >'. $req[1].'</span>';
                            $active_word_card->type = 2;
                            $active_word_card->card_type_id = 7;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 1;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 4;
                            $active_word_card->value = "<br>" .'<span style="color:black;text-decoration: underline;text-align:Center" >'. $req[4].'</span>';
                            $active_word_card->type = 2;
                            $active_word_card->card_type_id = 7;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 2;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();

                            $active_word_card = new FeildsValueWithCardType();
                            $active_word_card->field_id = 9;
                            $active_word_card->value = "<br>" . '<audio allow=”autoplay” autoplay="autoplay"      id="audio_record" class="audio_card" controls="" src = \'http://localhost/Anki-search/public/assets/audio/' . $req[9] . '\'  ></audio>';
                            $active_word_card->type = 2;
                            $active_word_card->card_type_id = 7;
                            $active_word_card->deck_id = $request->deck_id;
                            $active_word_card->position = 3;
                            $active_word_card->number_id = $number_id;
                            $active_word_card->status = 1;
                            $active_word_card->save();
                            if (!empty($req['images'])) {
                                $i = 1;
                                foreach ($req['images'] as  $key => $value) {
                                    if ($i == 1) {
                                        $active_word_card = new FeildsValueWithCardType();
                                        $active_word_card->field_id = 8;
                                        $style = 'height: 100px; width: 100px; padding-right: 20px;';
                                        $active_word_card->value = "<br>" . '<img src = \'' . $value . '\' style =\'' . $style . '\' >';

                                        $active_word_card->type = 2;
                                        $active_word_card->card_type_id = 7;
                                        $active_word_card->deck_id = $request->deck_id;
                                        $active_word_card->position = 4;
                                        $active_word_card->number_id = $number_id;
                                        $active_word_card->status = 1;
                                        $active_word_card->save();
                                        $i += 1;
                                    } else {
                                        $active_word_card = new FeildsValueWithCardType();
                                        $active_word_card->field_id = 8;
                                        $style = 'height: 100px; width: 100px; padding-right: 20px;';
                                        $active_word_card->value = "<br>" . '<img src = \'' . $value . '\' style =\'' . $style . '\' >';

                                        $active_word_card->type = 2;
                                        $active_word_card->card_type_id = 7;
                                        $active_word_card->deck_id = $request->deck_id;
                                        $active_word_card->position = 4;
                                        $active_word_card->number_id = $number_id;
                                        $active_word_card->status = 1;
                                        $active_word_card->save();
                                    }
                                }
                            }
                        }
                    }
                }

                if (!empty($req['extra_card1_instruction']) && !empty($req['extra_card1_front']) && !empty($req['extra_card1_back'])) {
                    $number_id = rand(1, 1000000);
                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<span style="color:black;text-align:Center" >' . '#' . $req['extra_card1_instruction'] . '#' . '</span>';
                    $extra_card->type = 1;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 1;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;

                    $extra_card->save();



                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value =  "<br>" . '<span style="color:red;text-align:Center" >' . $req['extra_card1_front'] . '</span>';
                    $extra_card->type = 1;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 2;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();


                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<i style="color:black;text-align:Center" >' . 'Answer:' . '</i>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 1;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();


                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<span style="color:#33bb2a;text-decoration: underline;text-align:Center" >' . $req['extra_card1_back'] . '</span>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 2;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();

                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 1;
                    $extra_card->value = "<br>" . '<span style="color:red;text-align:Center" >' . $req[1] . '</span>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 3;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();
                }

                if (!empty($req['extra_card2_instruction']) && !empty($req['extra_card2_front']) && !empty($req['extra_card2_back'])) {
                    $number_id = rand(1, 1000000);
                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<span style="color:black;text-align:Center" >' . '#' . $req['extra_card2_instruction'] . '#' . '</span>';
                    $extra_card->type = 1;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 1;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;

                    $extra_card->save();



                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<span style="color:red;text-align:Center" >' . $req['extra_card2_front'] . '</span>';
                    $extra_card->type = 1;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 2;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();


                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<i style="color:black;text-align:Center" >' . 'Answer:' . '</i>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 1;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();


                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<span style="color:#33bb2a;text-decoration: underline;text-align:Center" >' . $req['extra_card2_back'] . '</span>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 2;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();

                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 1;
                    $extra_card->value = "<br>" . '<span style="color:red;text-align:Center" >' . $req[1] . '</span>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 3;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();
                }


                if (!empty($req['extra_card3_instruction']) && !empty($req['extra_card3_front']) && !empty($req['extra_card3_back'])) {
                    $number_id = rand(1, 1000000);

                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<span style="color:black;text-align:Center" >' . '#' . $req['extra_card3_instruction'] . '#' . '</span>';
                    $extra_card->type = 1;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 1;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;

                    $extra_card->save();



                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<span style="color:red;text-align:Center" >' . $req['extra_card3_front'] . '</span>';
                    $extra_card->type = 1;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 2;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();


                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<i style="color:black;text-align:Center" >' . 'Answer:' . '</i>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 1;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();


                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<span style="color:#33bb2a;text-decoration: underline;text-align:Center" >' . $req['extra_card3_back'] . '</span>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 2;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();

                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 1;
                    $extra_card->value = "<br>" . '<span style="color:red;text-align:Center" >' . $req[1] . '</span>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 3;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();
                }

                if (!empty($req['extra_card4_instruction']) && !empty($req['extra_card4_front']) && !empty($req['extra_card4_back'])) {

                    $number_id = rand(1, 1000000);
                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<span style="color:black;text-align:Center" >' . '#' . $req['extra_card4_instruction'] . '#' . '</span>';
                    $extra_card->type = 1;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 1;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;

                    $extra_card->save();



                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<span style="color:red;text-align:Center" >' . $req['extra_card4_front'] . '</span>';
                    $extra_card->type = 1;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 2;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();


                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<i style="color:black;text-align:Center" >' . 'Answer:' . '</i>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 1;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();

                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 12;
                    $extra_card->value = "<br>" . '<span style="color:#33bb2a;text-decoration: underline;text-align:Center" >' . $req['extra_card4_back'] . '</span>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 2;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();

                    $extra_card = new FeildsValueWithCardType();
                    $extra_card->field_id = 1;
                    $extra_card->value = "<br>" . '<span style="color:red;text-align:Center" >' . $req[1] . '</span>';
                    $extra_card->type = 2;
                    $extra_card->card_type_id = 6;
                    $extra_card->deck_id = $request->deck_id;
                    $extra_card->position = 3;
                    $extra_card->number_id = $number_id;
                    $extra_card->status = 1;
                    $extra_card->save();
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

        return redirect('home/')->with('success', 'Card created successfully!');
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

        return redirect('home/')->with('success', 'Deck details were successfully updated!');
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


    public function updateCount(Request $request)
    {
        // print_r);die;
        Decks::where('id', $request->deck_id)->update(array('total_count' => $request->count));

        echo json_encode($request->deck_id);
        die;
    }

    public function startStudy($id)
    {
        //     $questions=FieldsAndValue::where('deck_id',$id)->where('position',1)->get();
        //     $answers=FieldsAndValue::where('deck_id',$id)->where('position',NULL)->get();
        // //  print_r($answer->toArray());die;
        //     $decks=Decks::find($id);
        //     $count= $decks->total_count;
        //     $cards=Cards::where('deck_id',$id)->first();
        //     return view('startStudy',compact('questions','answers','cards','count'));
        $card_types = CardTypes::where('deck_id', $id)->orWhere('deck_id', 1)->get();
        return view('card_type', compact('card_types'));
    }

    public function startStudyFromCardType($id)
    {
        $alls = FeildsValueWithCardType::Select('number_id')->where('card_type_id', $id)->groupBy('number_id')->get();
        $questions = FeildsValueWithCardType::where('card_type_id', $id)->where('type', 1)->get();
        $answers = FeildsValueWithCardType::where('card_type_id', $id)->where('type', 2)->get();
        //  print_r($answer->toArray());die;
        //  print_r($alls->number_id);die;
        // $coun
        $decks = Decks::find(6);
        $count = $alls->count();
        $cards = Cards::where('deck_id', 6)->first();
        return view('startStudy', compact('questions', 'alls', 'answers', 'cards', 'count'));
    }
}
