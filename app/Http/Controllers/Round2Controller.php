<?php

namespace App\Http\Controllers;

use App\Libraries\callAPI;
use Illuminate\Http\Request;

class Round2Controller extends Controller
{
    protected $callApi;

    public function __construct()
    {
        $this->callApi = new callAPI();
    }

    public function index()
    {

        $list_posts = $this->callApi->getDataFromApi('',[
            'per_page' => 100,
        ]);
        dd($list_posts);
        return view('index.index',compact('listRepresentationOfEachProduct'));
    }

}
