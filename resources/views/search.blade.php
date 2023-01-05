@extends('layouts.main')
@section('title')
    <title>Search page</title>
@endsection

@section('container')


    <div class="wrapper1">
        <h2 class = "text">Search Your Favorite Cloth</h2>
        <br>
        <div class="forms1">

            <div class="forms2">
                <main class="form-login">
                    <form action="" method="">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="search" id="search" class="text-form" required autofocus>
                        <label for="search"></label>
                        <button class="text-button" type="submit">Search</button>
                    </div>
                    </form>
                </main>
            </div>
        </div>


        <div class="card-deck">
            @foreach ($items as $item )
                <div class="card" style="width: 18rem;">
                    <div class="item-image">
                        <img src="{{Storage::url('images/'.$item->image)}}" class="card-img-top" alt="...">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">Rp {{ number_format($item->price) }} </p>
                        <a href="/item_detail/{{ $item->name }}" class="btn btn-primary">More Detail</a>
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
        .form-floating{
            display: flex;
            justify-content: center;
            flex-direction: row;
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
