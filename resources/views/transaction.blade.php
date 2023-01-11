@extends('layouts.main')

@section('title')
    {{ auth()->user()->username }}'s Purchase History
@endsection

@section('container')
    <h1 style="text-align: center">Check What You've Bought!</h1> <br>
    <div class="wrapper2">
        <?php $ctr = 1; ?>
        @forelse ($transactions as $transaction)
            <div class = wrapper1>
                <h4> Transaction #{{$ctr}} </h4>
                Transaction Date: <b>{{ $transaction->date }}</b>
                @foreach ($transaction->items as $item)
                    <ul>
                        <li style="list-style-type:circle">{{ $item->pivot->quantity }} pc(s) {{ $item->name }} &nbsp;&nbsp; = &nbsp; Rp{{ number_format($item->price, 2, ',', '.') }}</li>
                    </ul>
                @endforeach
                <h4>Total Price: Rp{{ number_format($transaction->total_transaction, 2, ',', '.') }}</h4>
                Payment Type: <b> {{$transaction->payment_type}} </b>
            </div>
            <?php $ctr += 1; ?>
        @empty
            <div class="box">
                <div class="empty">
                    <img src="{{Storage::url('images/bill.png')}}" class="cart-img" alt="cart_image"> <br>
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
            display: inlin
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
