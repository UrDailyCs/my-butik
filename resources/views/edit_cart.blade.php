@extends('layouts.main')
@section('title')
    <title>detail item</title>
@endsection

@section('container')

<section class="section">
    <div class="card detail">
        <div class="card-img">
        <img src="{{Storage::url('images/'.$item->image)}}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="card-title"><b>{{ $item->name }}</b></h5>
            {{-- <p class="card-text">Rp {{ number_format($item->price) }}  Qty: {{ $item->stock }}</p> --}}
            <p class="card-text">Rp {{ number_format($item->price) }}</p>
            <hr>
            <p class="card-text">
                {{ $item->description }}
            </p>

            <div class="card-footer">
                <form action="/edit_cart/{{ $item->id }}" method="POST">
                    @csrf
                    <div>
                        <h1 style="font-size: 15px; margin-left:5px;">Quantity: </h1>
                    </div>
                    <div class="buttons">
                        <input type="number" name="quantity" id="quantity" placeholder="1">

                        <button type="submit" class="btn btn-primary" id="update-btn">Update Cart</button>
                    </div>
                    <div>
                        <a href="{{ url()->previous() }}" class="w-100 btn btn-lg btn-danger mt-3">back</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

<style>
    .buttons{
        display: flex;
        justify-content: center;
    }
    #quantity{
        height: 40px;
    }
    #update-btn{
        height: 40px;
        width: 200px;
        margin-left: 20px;
    }
    .card-text{
        font-size:25px;
    }
    .card-title{
        font-size: 35px;
    }
    .section{
        justify-content: center;
        display: flex;
    }
    .card-body{
        border-width: 5px;
        border-radius: 9px 9px 9px 9px;
        -moz-border-radius: 9px 9px 9px 9px;
        -webkit-border-radius: 9px 9px 9px 9px;
        border: 4px solid #b2b4b9;
        margin-left: 20px;
    }
    .card-img{
        max-width: 250px;
        max-height: 500px;
        border-width: 5px;
        border-radius: 9px 9px 9px 9px;
        -moz-border-radius: 9px 9px 9px 9px;
        -webkit-border-radius: 9px 9px 9px 9px;
        border: 4px solid #b2b4b9;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .btn-primary{
        width: 100px;
    }
    .card-img-top{
        width: 200px;
        height: 200px;
        max-width: 200px;
        min-width: 200px;
        max-height: 200px;
        min-height: 200px;
    }
    .detail{
        background-color: rgb(240, 235, 235);
        border: black;
        width: 800px;
        display: flex;
        flex-direction: row;
        padding:20px;
        border-radius: 17px 17px 17px 17px;
        -moz-border-radius: 17px 17px 17px 17px;
        -webkit-border-radius: 17px 17px 17px 17px;
        border: 0px;
    }
</style>
@endsection