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
    public function __construct(Request  $request)
    {
        $this->middleware('auth');
        
        if(Auth::check()){
            $email = Auth::user()->email;
            if(DB::table('details')->where('user',$email)->exists()){
                $details = DB::table('details')->where('user', $email)->get();
                $request->session()->put('details', (array)$details);
            }
        }
        
    }

    public function index(){
        if(Auth::check()){
            return redirect()->route('login');
        }else{
            return view('index');
        }
    }

    public function dashboard(Request $request){
        if(Auth::check()){
            $email = Auth::user()->email;
            
            if(DB::table('details')->where('user',$email)->exists()){
                $details = DB::table('details')->where('user', $email)->first();
            }

            $spendings = DB::table('spendings')->where('user', $email)->get(); 
            $savings = DB::table('savings')->where('user', $email)->get(); 
            return view('dashboard')->with([
                'additions' => $details ,
                'spendings' => $spendings,
                'savings' => $savings
            ]);

        }else{
            return redirect()->route('/');
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
