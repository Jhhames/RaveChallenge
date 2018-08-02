<?php

namespace App\Http\Controllers;
use Form;
use Guzzle\GuzzleHttp;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('index');
    }
}
