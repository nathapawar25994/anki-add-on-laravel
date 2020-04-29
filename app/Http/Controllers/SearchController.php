<?php

namespace App\Http\Controllers;

use Auth;
// use App\Fields;
use Illuminate\Http\Request;
use JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngine;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class SearchController extends Controller
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
    // public function index(Request $request,$id)
    // {
    //     $fields = Fields::where('entity_id',$id)->get();
    //     $count = $fields->count();

    //     return view('fields.index', compact('fields', 'count','id'));
    // }


    public function index()
    {
        return view('browser');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function search(Request $request)
    {
        // if ($request->aks == 1) {

        //     dd("search for Longman");
        //     die;
        //     $client = new GuzzleHttp\Client();
        //     $res = $client->get('https://api.github.com/user', ['auth' =>  ['akshay2424', 'akshay24091996']]);
        //     echo $res->getStatusCode(); // 200
        //     echo $res->getBody();
        // } else {
        //     dd("search for Image");
        //     die;
        // }
        // $parameters = array(
        //     'start' => 10,
        //     'num' => 10 ,
        //     'searchType'=>'image',

        // );

        // $fulltext = new LaravelGoogleCustomSearchEngine(); // initialize
        // $results = $fulltext->getResults('cat',$parameters); // get first 10 results for query 'some phrase'
        // print_r($results);die;
        
        // $goutteClient = new Client();
        // $guzzleClient = new GuzzleClient(array(
        //     'timeout' => 60,
        //     'verify' => false
        // ));
        // $goutteClient->setClient($guzzleClient);
        // $crawler = $goutteClient->request('GET', 'https://www.ldoceonline.com/dictionary/good');
        // $crawler->filter('.entry_content')->each(function ($node) {

        //     $results = $node->html();
        //     return view('setSentence.create', compact('someArray'));
        // });


        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
            'verify' => false
        ));
        $someArray=[];
        $goutteClient->setClient($guzzleClient);
        $crawler = $goutteClient->request('GET', 'https://www.ldoceonline.com/dictionary/good');
        $crawler->filter('.entry_content')->each(function ($node) {
            $someArray []= $node->html();
        
        });
           echo"<pre>"; print_r($someArray);die; 

        return view('setSentence.word',compact('someArray'));

    }

    public function setSentence(Request $request)
    {
        $someArray = '';
        return view('setSentence.create', compact('someArray'));
    }

    public function searchImage1(Request $request)
    {
        $someArray = [
            [
                "ID" => "COO1",
                "Name" => "Spec_1",
                "Image" => "https://www.encodedna.com/images/theme/jQuery.png"
            ],
            [
                "ID" => "COO3",
                "Name" => "Spec_3",
                "Image" => "https://www.encodedna.com/images/theme/angularjs.png"
            ],
            [
                "ID" => "COO2",
                "Name" => "Spec_2",
                "Image" => "https://www.encodedna.com/images/theme/json.png"
            ]
        ];
        // $post_data = json_encode($someArray);

        // print_r($someArray[Image]);die;
        // $someArray=$someArray->toArray();
        // $query = 'Foobar';
        // $ch = curl_init();
        // // set url 
        // curl_setopt($ch, CURLOPT_URL, "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=" . urlencode($query));

        // //return the transfer as a string 
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // // $output contains the output string as json
        // $output = json_decode(curl_exec($ch));

        // // close curl resource to free up system resources 
        // curl_close($ch);

        // print_r($output);die;

        return view('setSentence.create', compact('someArray'));
    }

    public function searchWord(Request $request)
    {
        // $parameters = array(
        //     'start' => 10,
        //     'num' => 10 ,
        //     'searchType'=>'image',

        // );

        // $fulltext = new LaravelGoogleCustomSearchEngine(); // initialize
        // $results = $fulltext->getResults($request->search,$parameters); // get first 10 results for query 'some phrase'
        
        // echo json_encode($results);
        // die;
       $word= $request->search;
    //    print_r($word);die;
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
            'verify' => false
        ));
        $goutteClient->setClient($guzzleClient);
        $crawler = $goutteClient->request('GET', 'https://www.ldoceonline.com/dictionary/'.$word);
        $crawler->filter('.entry_content')->each(function ($node) {
            $results = $node->html();
            echo $results;
        die;
        });
    }

    public function searchImage(Request $request)
    {
        $parameters = array(
            'start' => 10,
            'num' => 10 ,
            'searchType'=>'image',

        );

        $fulltext = new LaravelGoogleCustomSearchEngine(); // initialize
        $results = $fulltext->getResults($request->search,$parameters); // get first 10 results for query 'some phrase'
        
        echo json_encode($results);
        die;

        // $goutteClient = new Client();
        // $guzzleClient = new GuzzleClient(array(
        //     'timeout' => 60,
        //     'verify' => false
        // ));
        // $goutteClient->setClient($guzzleClient);
        // $crawler = $goutteClient->request('GET', 'https://www.ldoceonline.com/dictionary/good');
        // $crawler->filter('.entry_content')->each(function ($node) {
        //     $results = $node->html();
        //     echo $results;
        // die;
        // });
    }

    // public function create()
    // {
    //     return view('project_types.create');
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    // public function store(Request $request)
    // {
    //     //Model Validation
    //     // $this->validate($request, ['name' => 'unique:mst_goals,name']);

    //     $fields = new Fields($request->all());


    //     $fields->save();

    //    // flash()->success('Fields was successfully created');

    //    return redirect(action('FieldsController@index', ['id' =>$fields->entity_id]));
    // }

    // public function edit($id)
    // {
    //     $fields = Fields::findOrFail($id);
    //     $entity_id=$fields->entity_id;
    //     return view('fields.edit', compact('fields','entity_id'));
    // }

    // public function update($id, Request $request)
    // {
    //     $fields = Fields::findOrFail($id);

    //     $fields->update($request->all());
    //     $fields->save();
    //   //  flash()->success('Fields details were successfully updated');

    //   return redirect(action('FieldsController@index', ['id' =>$fields->entity_id]));
    // }

    // public function delete($id)
    // {
    //     Fields::destroy($id);

    //     return back();
    // }
}
