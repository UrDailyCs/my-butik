<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Carbon\Carbon ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    //

    public function transactionPage($username){
        $transactions = Transaction::where('user_id',auth()->user()->id)->get();
        // dd($transactions);
        return view('transaction', ['transactions'=>$transactions]);
    }

    public function addTransaction(){
        $user_id = auth()->user()->id;
        $cart = Cart::where('user_id', $user_id)->first();
        // dd($id, $cart);
        $total_price= 0;
        $total_quantity = 0;
        foreach ($cart->items as $item){
            $total_price += $item->pivot->quantity * $item->price;
            $total_quantity += $item->pivot->quantity;
        }
        if( $total_quantity === 0 ) return redirect('home');
        $transaction_id = DB::table('transactions')->insertGetId([
            'user_id' => $user_id,
            'total_transaction'=>$total_price,
            'date' => Carbon::now()
        ]);

        $transaction = Transaction::where('id', $transaction_id)->first();
        // dd($transaction);
        foreach ($cart->items as $item){
            // DB::table('item_transaction')->insert([
            //     'transaction_id' =>$transaction_id,
            //     'item_id' => $item->id,
            //     'quantity'=>$item->pivot->quantity,
            //     'created_at' => Carbon::now()
            // ]);
            $transaction->items()->attach(
                $item->id, ['quantity'=>$item->pivot->quantity]
            );
        }
        $cart->items()->detach();
        return redirect('history/'.auth()->user()->username);
    }
}
