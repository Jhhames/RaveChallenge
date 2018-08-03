<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use Auth;
// use GuzzleHttp\Psr7\Request  as ApiRequest;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use App\Card;


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
            return rediecr()->route('/savig');
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
                'timeout' => 20
            ]);
            $data = array(
                "PBFPubKey" => $this->publicKey,
                'cardno'=>'5399838383838381',
                // 'cardno'=> $request->input('card-number'),
                'cvv' =>'470',
                // 'cvv' => $request->input('cvv'),
                "amount" => "50",
                'expiryyear' => '22',
                // 'expiryyear' => $request->input('year'),
                'expirymonth' => '10',
                // 'expirymonth' => $request->input('month'),
                'email' => Auth::user()->email,
                'IP' =>$_SERVER['REMOTE_ADDR'],
                'suggested_auth' => 'pin',
                'pin' => '3310',
                "txRef" => "MC-".time(),
            );

            $jsonData = json_encode($data);
            $encKey = $this->getKey($this->secretKey);
            $clientKey = $this->encrypt3Des($jsonData, $encKey);
             
            $postdata = array(
                'PBFPubKey' => $this->publicKey,
                'client' => $clientKey,
                'alg' => '3DES-24'
            );
            $postdata = json_encode($postdata);

            // return $clientKey;
 
            try{
                $response = $client->request('post','/flwv3-pug/getpaidx/api/charge',[
                    'headers' => [
                        'Content-Type'=> 'application/json',
                    ],
                    'body' => $postdata,
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
                return redirect()->route('/addcard')->with('message', $error);
            }else{
                // print_r(json_decode($body));
                $responseArray = json_decode($body);
                $transaction_ref =  $responseArray->data->flwRef;

                try{
                    $response = $client->request('post','flwv3-pug/getpaidx/api/validatecharge',[
                        'body' => json_encode([
                            'PBFPubKey' => $this->publicKey,
                            'transaction_reference' => $transaction_ref,
                            'otp' => '12345'
                        ]),
                        'headers'=> [
                            'Content-Type' => 'application/json'
                        ]
                    ]);

                    $resbody = $response->getBody();
                }catch(ClientException $e){
                    $errorMessage = $e->getMessage();
                }catch(ConnectException $e){
                    $errorMessage = $e->getMessage();
                }catch(\Exception $e){
                    $errorMessage = $e->getMessage();
                }

                if(isset($errorMessage)){
                    // echo $errorMessage;
                    return redirect()->route('/addcard')->with('message', $errorMessage);
                }else{
                    $success = json_decode($resbody);
                    if($success->status == 'sucess'){
                        $history = new History;
                        $history->user = Auth::user()->email;
                        $history->type = 'Debit';
                        $history->amount= '#50';
                        $history->status = 'Successful';

                        $history->save();
                    }
                    // print_r($success);
                    $card_token = $success->data->tx->chargeToken->embed_token;
                    // echo $card_token;

                    $cardDetail = new Card;
                    $cardDetail->user = Auth::user()->email;
                    $cardDetail->token = $card_token;

                    if($cardDetail->save()){
                        return redirect()->route('/addcard')->with('message', 'Card Added Successfully, you`ve been charged #50');
                    }else{
                        return redirect()->route('/addcard')->with('message', 'Error saving card detail,try again');
                    }
                }
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
