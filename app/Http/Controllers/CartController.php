<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function cart(){
        // dd(Cart::with('items')->first());

        $cart = Cart::where('user_id',auth()->user()->id)->first();
        $total_price= 0;
        $total_quantity = 0;
        $items = $cart->items;
        foreach ($items as $item){
            $total_price += $item->pivot->quantity * $item->price;
            $total_quantity += $item->pivot->quantity;
        }

        // if ($total_quantity === 0) $items = null;
        return view('cart',['items'=>$items, 'total_price'=> $total_price, 'total_quantity'=> $total_quantity ]);
    }
}
