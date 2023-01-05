
@extends('layouts.main')
@section('title')
    <title>Edit Profile Page</title>
@endsection

@section('container')

    <div class="row justify-content-center">
        <div class="col-lg-5" class="bg-danger">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Update Profile</h1>
            <form action="/updateProfile/{{ auth()->user()->id }}" method="post" >
                @csrf

                <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                    <label for="username">Username</label>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="text" name="phone_number" class="form-control rounded-top @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="phone_number" required value="{{ old('phone_number') }}">
                    <label for="phone_number">Phone Number</label>
                    @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="text" name="address" class="form-control rounded-top @error('address') is-invalid @enderror" id="address" placeholder="address" required value="{{ old('address') }}">
                    <label for="address">Address</label>
                    @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Update</button>
                <a href="{{ url()->previous() }}" class="w-100 btn btn-lg btn-danger mt-3">back</a>
            </form>
        </main>
        </div>
    </div>

@endsection
