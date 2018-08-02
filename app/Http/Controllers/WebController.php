<?php

namespace App\Http\Controllers;
use Form;
use Guzzle\GuzzleHttp;
use Illuminate\Http\Request;
use User;
use Auth;
class WebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(Auth::check()){
            return redirect()->route('login');
        }else{
            return view('index');
        }
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function savings(){
        return view('savings');
    }

    public function spendings(){
        return view('expenses');
    }

    public function addcard(Request $request){
        if(Auth::check()){
            return view('addcard');
        }else{
            return redirect()->route('login');
        }
    }

    public function history(){
        return view('history');
    }

    public function details(){
        return view('details');
    }


}
