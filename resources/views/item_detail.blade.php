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
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="card-text">Rp {{ number_format($item->price) }}  Qty: {{ $item->stock }}</p>
            <hr style="height: 10px; color:gray" >
            <p class="card-text">
                {{ $item->description }}
            </p>


            <div class="card-footer">
                @if(auth()->user()->role === 'member')
                    <form action="/ToCart/{{ $item->id }}" method="POST">
                        @csrf
                        <input type="number" name="quantity" id="quantity" placeholder="Qty" value="{{ old('quantity') }}">
                        @error('quantity')
                                {{ $message }}
                        @enderror
                        {{-- <div class="form-floating">
                            <input type="quantity" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" required autofocus value="{{ Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : old('quantity')}}">
                            <label for="quantity">quantity address</label>
                            @error('quantity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                @endif

                <a href="{{ url()->previous() }}" class="w-100 btn btn-lg btn-danger mt-3">back</a>
                @if (auth()->user()->role === 'admin')
                    <a href="/delete_item/{{ $item->id }}" class="w-100 btn btn-lg btn-danger mt-3">delete item</a>
                @endif
            </div>
        </div>
    </div>

<style>
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
        width: 200px;
        height: max-content;
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
