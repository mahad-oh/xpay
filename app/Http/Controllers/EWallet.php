<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EWallet extends Controller
{
    public function index(Request $request){

        $balance = $request->session()->get('balance',0); // Example Wallet Balance
        $transactions = [
            ['description' => 'Achat chez Amazon', 'amount' => -45.99],
            ['description' => 'Transfert vers Banque', 'amount' => -500.00],
            ['description' => 'Remboursement', 'amount' => 120.00],
        ];

        return view('welcome', compact('balance', 'transactions'));
    }

    public function recharge(Request $request){
        $request->validate([
            'voucher' => 'required'
        ]);

        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 3|Epff1WSZqXG4uB2PnXN1Q4vLBc6NZEZ1PcWXTMOTfaf6447a',
            'Origin' => "https://xpay.mohackz.tech"
        ])
        ->post('http://fleex.mohackz.tech/api/vouchers/redeem', [
            "code" => $request->voucher
        ]);

        if($response->failed()){
            $request->session()->flash('message','Voucher invalid ou inactif');
            dd($response);
            return redirect()->route('dashboard');
        }
        
        $voucher_info = $response->json()['voucher_info'][0];
        
        $amount = $voucher_info['amount'];

        $request->session()->increment('balance',$amount);
        $request->session()->flash('message','Wallet réchargé avec succès !');


        return redirect()->route('dashboard');


    }

    public function reset(Request $request){
        $request->session()->flush();

        return redirect()->route('dashboard');
    }
}
