@extends('layouts.main')
@section('title')
    <title>{{ auth()->user()->username }}'s Purchase History</title>
@endsection

@section('container')
<h1 style="text-align: center">Check What You've Bought!</h1>
<br>

{{-- <a href="/checkOut"> <button class="btn btn-primary">Check out ({{ $total_quantity}})</button> </a> --}}
    <div class="wrapper2">
    @forelse ($transactions as $transaction )
        <div class = wrapper1>
            <h4> {{ $transaction->date }}</h4>
            @foreach ($transaction->items as $item )
                <ul >
                    <li style="list-style-type:circle">{{ $item->pivot->quantity }} pc(s) {{ $item->name }} &nbsp;&nbsp; = &nbsp;Rp.{{ number_format($item->price) }}</li>
                </ul>
            {{-- <a href="/item_detail/{{ $item->id }}" class="btn btn-primary">detail</a> --}}
            @endforeach
            <h4>Total Price = Rp {{ number_format($transaction->total_transaction)}}</h4>
        </div>
    @empty
        <div class="box">
            <div class="empty">
            <img src="{{Storage::url('images/bill.png')}}" class="cart-img" alt="cart_image">
            <br>
            </div>
            <div class="empty">
                <h1 class="" style="margin: 0 auto"><b>Sorry, no transaction found<b></h1>
                <h3 style="text-align: center">We don't see any record</h3>
                <h3 style="text-align: center">from your history</h3>
            </div>
        </div>
    @endforelse
    </div>
    <style>
        .box{
            padding-top: 50px;
            display: flex;
            flex-direction: column;
            margin: auto;
        }
        .empty{
            gap: 7px;
            display: flex;
            flex-direction: column;
            margin: auto;
        }
        .cart-img{
            max-width: 250px;
            max-height: 250px;
        }
        .wrapper1{
            background-color: rgb(219, 217, 217);
            display: flex;
            flex-direction: column;
            padding-left: 50px;
            padding-top: 25px;
            padding-bottom: 25px;
            margin-left:20px;
            margin-right: 20px;
            border-radius: 3px 3px 3px 3px;
        }
        .wrapper2{
            margin-left:20px;
            margin-right: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
    </style>
@endsection
