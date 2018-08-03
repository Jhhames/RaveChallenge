<?php

namespace App\Http\Controllers;
use Form;
use Guzzle\GuzzleHttp;
use Illuminate\Http\Request;
use User;
use Auth;
use DB;
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
            if($this->checkCardAdded()){
                return view('addcard')->with('check', 'true');
            }else{
                return view('addcard');
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function history(){
        if(Auth::check()){
            $email = Auth::user()->email;
                if(DB::table('histories')->where('user',$email)->exists()){
                    $data = DB::table('histories')->where('user',$email)->get();
                }else{
                    $data = null;
                }
                    return view('history')->with('data',$data);

        }else{
            return redirect()->route();
        }
    }

    public function details(){
        return view('details');
    }

    protected function checkCardAdded(){
        $email = Auth::user()->email;
        if(DB::table('cards')->where('user',$email)->exists()){
            return true;
        }else{
            return false;
        }
    }


}
