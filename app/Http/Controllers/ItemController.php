<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    //

    public function getAllItems(){
        $items = Item::paginate(8);

        return view('home', ['items' => $items]);
    }
    public function search(Request $req){
        $search = $req->search;
        $items = Item::where('name', 'LIKE', "%$search%")->paginate(8)->appends(['search'=>$search]);

        return view('search', ['items' => $items]);
    }
    public function detailItems($name){
        $item = Item::where('name',$name)->first();
        return view('item_detail', ['item' => $item]);
    }
    public function addItemPage(){
        return view('add_item');
    }
    public function addItem(Request $req){

        $validatedData = $req->validate(
            [
                'name'=> 'required|unique:items|min:5|max:20',
                'description'=>'required|min:5',
                'price'=>'required|integer|min:1000',
                'stock' => 'required|integer|min:1',
                'image' => 'required|mimes:jpg,jpeg,png'
            ]
        );
        $file = $req ->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName= time().'.'.$extension;
        $validatedData['image']= $fileName;
        Item::insert($validatedData);

        $file = $req ->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName= time().'.'.$extension;
        Storage::putFileAs('public/images/', $file, $fileName);
        return redirect('/home')->with('successAddingItem', 'Successfully added new item');

        // DB::table('users')->insert([
        //     'username' => $req->username,
        //     'email' => $req->email,
        //     'password' => bcrypt($req->password),
        //     'address' => $req->address,
        //     'phone_number' => $req->phoneNumber,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }

    public function addItemToCart(Request $req, $id){
        // $name = auth()->user()->username;
        // dd($req->quantity, $name, $id);
        $validatedData = $req->validate(
            [
                'quantity' => 'required|integer|min:1'
            ]
        );

        $cart = auth()->user()->cart;

        // $cart::where('item')->exists();

        if($cart->items()->wherePivot('item_id', $id)->exists()){
            $itemModel = new ItemController();
            $itemModel->editCart($req, $id);
            // ItemController::editCart($req, $id);
            return redirect('/cart/'.auth()->user()->username);
        }
        $cart->items()->attach([
            $id => [
                'quantity'=> $validatedData['quantity']
            ]
        ]);
        return redirect('/cart/'.auth()->user()->username);
    }

    public function editCartPage( $id){
        $item = Item::find($id);
        return view('edit_cart', ['item'=>$item]);
    }

    public function editCart(Request $req, $id){
        $validatedData = $req->validate(
            [
                'quantity' => 'required|min:1'
            ]
        );
        $cart = auth()->user()->cart;
        $cart->items()->updateExistingPivot($id, ['quantity'=> $req->quantity]);

        $cart->save();
        return redirect('/cart/'.auth()->user()->username);
    }

    public function removeFromCart($id){
        $cart = auth()->user()->cart;

        $cart->items()->detach($id);
        return redirect('/cart/'.auth()->user()->username);
    }
    public function deleteItem($id){
        $i = item::find($id);
        Storage::delete('public/images/'. $i->image);
        DB::table('items')->where('id', $id)->delete();

        return redirect('/home');
    }
}
