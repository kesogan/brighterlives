<?php

namespace App\Http\Controllers;

use App\Association;
use Illuminate\Http\Request;
use App\Helpers\TransactionLogger;

class CustomerController extends Controller
{
    public function makeDonation(Request $request){

        $association = Association::findOrFail($request->input('association_id'));

        $user = null;
        if(auth()->check()){
            $user = auth()->user()->getFullName();
            $email = auth()->user()->email;
        }else{
            if($request->input('donator') != null){
                $user = $request->input('donator');
                 $email = $request->input('email');
            }else{
                $user = 'Anonymous';
                $email = null;
            }
        }
        $donation_amount =  $request->input('donation_amount');
         $tel = $request->input('_tel');

        try {
            //Make payment
            try {
                $client = new Client();
                $response = $client->request('GET', 'https://developer.mtn.cm/OnlineMomoWeb/faces/transaction/transactionRequest.xhtml', [
                    'query' => [
                        '_amount' => $donation_amount,
                        '_tel' => $tel,
                        '_email' => $association->association_momo_master
                    ],
                    'timeout' => 120,
                    'connect_timeout' => 120,
                    'verify' => false,
                ]);

                // dd($response);

                if($response->getStatusCode() == 200) {
                    $body = $response->getBody();
                    $arr_body = json_decode($body);

                        //dd($arr_body);

                    if($arr_body->StatusCode != '01'){
                        flash('Transaction failed, Make sure your account is active and have enough money')->error();
                        return redirect()->back();
                    }else{
                            //Log transaction
                            TransactionLogger::log(
                                $user, 
                                'donation',
                                $association,
                                '',
                                $donation_amount ,
                                'User made a donation of '.$donation_amount .' XAF to the association  <a href="/admin/association?association_id='.$association->id.'">'.$association->association_name.'</a>'
                            );

                            //log activity
                           ActivityLogHelper::log(
                                $user,
                                'donations',
                                $association->id,
                                'User '.$user.'</a> made a donation  of '.$donation_amount .' XAF to the association  <a href="/admin/association?association_id='.$association->id.'">'.$association->association_name.'</a>'
                            );

                        //Email  Notification

                        //Return back
                        flash('Thanks for your donation')->success();
                        return redirect()->back();
                    }
                }
            } catch(\Exception $e) {
                flash('Transaction unsuccessful' .$e->getMessage())->error();
                return redirect()->back();
            }
        } catch (\Exception $th) {
            flash('Transaction unsuccessful' .$th->getMessage())->error();
            return redirect()->back();
        }
    }

    public function placeOrder(){
        
    }
}
