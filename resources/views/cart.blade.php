@extends('layouts.main')
@section('title')
    <title>{{ auth()->user()->username }}'s Cart</title>
@endsection

@section('container')



    <div class="wrapper1">
        <h1 style="text-align: center; font-size:50px;"><b>My Cart<b></h1>
        <div class="checkout">
            <h3>Total Price = Rp {{ number_format($total_price)}}</h3>
            <a href="/checkOut"> <button class="btn btn-primary">Check out ({{ $total_quantity}})</button> </a>
        </div>
        <div class="card-deck">
            @forelse ($items as $item )
                <div class="card" style="width: 18rem;">
                    <div class="item-image">
                        {{-- <img src="{{ $item->image }}" class="card-img-top" alt="..."> --}}
                        <img src="{{Storage::url('images/'.$item->image)}}" class="card-img-top" alt="...">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }} <br></h5>
                        <h6 class="card-text">Rp {{ number_format($item->price) }}  Qty: {{ $item->pivot->quantity }}</h6>
                        <h6 class="card-text">Total = Rp {{ number_format($item->price * $item->pivot->quantity) }}</h6>
                        <a href="/edit_cart_page/{{ $item->id }}" class="btn btn-primary">Edit Cart</a>
                        <a href="/remove_from_cart/{{ $item->id }}" class="btn btn-danger">Remove from Cart</a>
                    </div>
                </div>
            @empty
                <div class="box">
                    <div class="empty">
                    <img src="{{Storage::url('images/cart.png')}}" class="cart-img" alt="cart_image">
                    <br>
                    </div>
                    <div class="empty">
                        <h1 class="" style="margin: 0 auto"><b>Your cart is empty<b></h1>
                        <h3 style="text-align: center">Looks like you have not added anything to your cart. Go</h3>
                        <h3 style="text-align: center">ahead and explore our catalog</h3>
                    </div>
                </div>
            @endforelse
        </div>
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
        .checkout{
            display: flex;
            flex-direction: row;
            gap: 20px;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .card-deck{
            display: flex;
            justify-content: flex-start;

        }
        .text{
            text-align: center;
            font-size: 35px;
            margin-bottom: 20px;
        }
        .wrapper1{
            width:1280px;
            display: flex;
            flex-direction: column;
            margin :auto;
        }
        .next{
            display: flex;
            text-align: center;
            justify-content: center;
            padding-top: 20px;
        }

    </style>
@endsection

{{--
<nav aria-label="Page navigation example" class="justify-content-center">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="{{ $items->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>

        @for ($i =1 ; $i <= $items->lastPage() ; $i++)
            @if ($i == $items->currentPage())
                <li class="page-item"><a style="color:red; font-weight:bold" class="page-link" href="{{ $items->url($i) }}"> {{ $i }}</a></li>
            @else
                <li class="page-item"><a href="{{ $items->url($i) }}" class="page-link">{{ $i }} </a></li>
            @endif
        @endfor

        <li class="page-item">
            <a class="page-link" href="{{ $items->nextPageurl() }}" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav> --}}
