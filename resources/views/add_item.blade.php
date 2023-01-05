@extends('layouts.main')
@section('title')
    <title>Add item</title>
@endsection

@section('container')

<div class="row justify-content-center">
        <div class="col-lg-5" class="bg-danger">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Add new Item</h1>
            <form action="/addItem" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-floating">
                <p> Clothes Image</p>

            </div>

            <div class="form-floating">
                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="cloth image" required value="{{ old('image') }}">
                <label for="" class="mt-20" style="padding-left: 20rem; padding:auto">Cloth image</label>
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="(5-20 letters)" required value="{{ old('name') }}">

                <label for="name"> Clothes Name </label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="textbox" name="description" class="form-control rounded-top @error('description') is-invalid @enderror" id="description" placeholder="description" required value="{{ old('description') }}">

                <label for="description"> Clothes Desc </label>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="number" name="price" class="form-control rounded-top @error('price') is-invalid @enderror" id="price" placeholder="price" required value="{{ old('price') }}">
                <label for="price">Cloth Price</label>
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="number" name="stock" class="form-control rounded-top @error('stock') is-invalid @enderror" id="stock" placeholder="stock" required value="{{ old('stock') }}">
                <label for="stock">Cloth stock</label>
                @error('stock')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Add Item</button>
            </form>
        </main>
        </div>
    </div>
@endsection
