<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EWallet extends Controller
{
    public function index(Request $request){

        $balance = $request->session()->get('balance',0); 

        return view('tfpay.home', compact('balance'));
    } 

    public function topup(Request $request){

        $balance = $request->session()->get('balance',0); 

        return view('tfpay.topup', compact('balance'));
    }

    public function recharge(Request $request){
        $request->validate([
            'voucher' => 'required|min:12'
        ]);
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            "Content-Type" => "application/json",
            'Authorization' => 'Bearer 3|Epff1WSZqXG4uB2PnXN1Q4vLBc6NZEZ1PcWXTMOTfaf6447a',
        ])
        ->post('https://fleex.mohackz.tech/api/vouchers/redeem', [
            "code" => $request->voucher
        ]);

        if($response->failed()){
            $request->session()->flash('message',"Your voucher code is invalid or already been used.");
            return view('tfpay.unsuccessful_topup');
        }
        
        $voucher_info = $response->json()['voucher_info'][0];
        
        $amount = $voucher_info['amount'];

        $request->session()->increment('balance',$amount);
        $request->session()->flash('message',"Your wallet has been recharged successfully !");


        return view('tfpay.successful_topup',[
            'balance' => $request->session()->get('balance'),
            'amount' => $amount
        ]);


    }

    public function reset(Request $request){
        $request->session()->flush();

        return redirect()->route('home');
    }
}
