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
        if(Auth::check()){
            $email = Auth::user()->email;
            $spendings = DB::table('spendings')->where('user', $email)->get(); 
            $savings = DB::table('savings')->where('user', $email)->get(); 
            return view('dashboard')->with([
                'spendings' => $spendings,
                'savings' => $savings
            ]);
        }else{
            return redirect()->route('/login');
        }
    }

    public function savings(){
        if(Auth::check()){
            $email = Auth::user()->email;
            if(DB::table('savings')->where('user',$email)->exists()){
                $data = DB::table('savings')->where('user', $email)->get();
               
                return view('savings')->with([
                    'data'=> $data,                    
                ]);
            }else{
                return view('savings')->with([
                    'data' => null
                ]);
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function spendings(){
        if(Auth::check()){
            $email = Auth::user()->email;
            if(DB::table('spendings')->where('user',$email)->exists()){
                $data = DB::table('spendings')->where('user', $email)->get();
               
                return view('expenses')->with([
                    'data'=> $data,                    
                ]);
            }else{
                return view('expenses')->with([
                    'data' => null
                ]);
            }
        }else{
            return redirect()->route('login');
        }
    }

    public function addcard(Request $request){
        if(Auth::check()){
            if($this->checkCardAdded()){
                return view('addcard')->with('check', 'true');
            }else{
                return view('addcard')->with('check', null);
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
