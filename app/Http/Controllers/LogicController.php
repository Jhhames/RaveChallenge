<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use Auth;
// use GuzzleHttp\Psr7\Request  as ApiRequest;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;


class LogicController extends Controller
{
    public function addSavings(Request $request){
        $this->validate($request,[
            'info' => 'requred',
            'amount'=> 'required|integer',
            'interval' => 'required'

        ]);

        $savings = new Saving;

        $savings->user = Auth::get()->email;
        $saving->info = $request->input('info');
        $saving->amount = $request->input('amount');
        $saving->interval = $request->input('interval');
        $saving->duration = $request->input('duration');
        $saving->saved = $request->input('saved');
        $saving->status = 'active';

        if($savings->save()){
            return response()->json($savings);
        }else{
            return response()->json('unable to connect', 402);
        }
    }

    public function addcard(Request $request){
        $this->validate($request, [
                'card-number' => 'required',
                'year' => 'required',
                'month' => 'required',
                'cvv' => 'required'
            ]);

            $client = new GuzzleClient([
                'base_uri' => 'https://ravesandboxapi.flutterwave.com',
                'timeout' => 10
            ]);
            $data = array(
                'PBFPubKey' => $this->publicKey,
                'cardno'=> $request->input('card-number'),
                'cvv' => $request->input('cvv'),
                'amount' => '500.00',
                'phonenumber' => '08165906890',
                'firstname'=> 'Jammes',
                'lastname' => 'falola',
                'expiryyear' => $request->input('year'),
                'expirymonth' => $request->input('month'),
                'email' => 'fjhhames@gmail.com ',
                'IP' =>$_SERVER['REMOTE_ADDR'],
                'suggested_auth' => 'pin',
                'pin' => '3310',
                "txRef" => "MC-".time(),
            );

            $jsonData = json_encode($data);
            $encKey = $this->getKey($this->publicKey);
            $clientKey = $this->encrypt3Des($jsonData, $encKey);
             
            $postdata = array(
                'PBFPubKey' => $this->publicKey,
                'client' => $clientKey,
                'alg' => '3DES-24'
            );
            $postdata = json_encode($postdata);

            // return $clientKey;
            // $jsonData = json_encode(
            //     [
            //     "seckey" => $this->secretKey,
            //     "from"=> "2018-01-01",
            //     "to"=> "2018-12-30",
            //     "currency"=> "NGN",
            //     "status"=> "successful"
            //     ]
            //     );
            try{
                $response = $client->request('post','/v2/gpx/paymentplans/create',[
                    'headers' => [
                        'Content-Type'=> 'application/json',


                    ],
                    'body' => $jsonData,
                ]);

                $body = $response->getBody();
                $statusCode = $response->getStatusCode();
                $statusMessage = $response->getReasonPhrase();
            }catch(ClientException $e){
                $error = $e->getMessage();
            }catch(ConnectionException $e){
                $error = $e->getMessage();
            }

            if(isset($error)){
                print $error;
            }else{
                print_r(json_decode($body));
            }
                
    }

    protected function getKey($seckey){
        $hashedkey = md5($seckey);
        $hashedkeylast12 = substr($hashedkey, -12);
      
        $seckeyadjusted = str_replace("FLWSECK-", "", $seckey);
        $seckeyadjustedfirst12 = substr($seckeyadjusted, 0, 12);
      
        $encryptionkey = $seckeyadjustedfirst12.$hashedkeylast12;
        return $encryptionkey;
      
    }

    protected function encrypt3Des($data, $key)
    {
        $encData = openssl_encrypt($data, 'DES-EDE3', $key, OPENSSL_RAW_DATA);
        return base64_encode($encData);
    }

    protected $publicKey = 'FLWPUBK-53b9c71cb632c7826b7dc39222307a52-X';
    protected $secretKey = 'FLWSECK-683bcece2777088d4d3d1977ad6506df-X';
}
