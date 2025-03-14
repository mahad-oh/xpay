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

        $response = Http::withToken('2|RNr41WBO0Wz1iRyC2ooWPyN7nq9v7kUW3U5ZK17W63a9a6a4')
        ->acceptJson()
        ->post('http://localhost:8080/api/vouchers/redeem', [
            "code" => $request->voucher
        ]);

        if($response->failed()){
            $request->session()->flash('message','Voucher invalid ou inactif');
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
