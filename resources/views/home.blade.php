@extends('layouts.main')

@section('title', 'Home')

@section('container')
    <div class="wrapper1">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <h1 class="text">Find Your Best Shoes Here!</h1>
            </div>
        </div>
        <div class="forms1">
            <form class="d-flex">
                <input class="form-control me-2" type="search" name="search" placeholder="Search Shoes" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="card-deck">
            @foreach ($items as $item )
                <div class="card" style="width: 18rem;">
                    <div class="item-image">
                        <img src="{{Storage::url('images/'.$item->image)}}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">Rp{{ number_format($item->price, 2, ',', '.') }}</p>
                        <a href="/item/view/{{ $item->id }}" class="btn btn-primary">More Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="next">
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
            </nav>
        </div>
    </div>
    <style>
        .card-deck{
            display: flex;
            justify-content: flex-start;

        }
        #search{
            width : 1100px;
            height: 40px;
        }
        .text-button{
            background-color: #0d6efd;
            color: white;
            height: 40px;
            margin-left: 50px;
            border-radius: 5px 5px 5px 5px;
            width: 100px;
        }
        .forms1 {
            margin: 0px 15px;
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
