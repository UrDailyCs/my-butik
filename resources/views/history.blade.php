@extends('layouts.main')
@section('title')
    <title>{{ auth()->user()->username }}</title>
@endsection

@section('container')

<section class="section">
    <div class="card detail">
        {{-- <div class="card-img">
        <img src="{{ $item->image }}" class="card-img-top" alt="...">
        </div> --}}
        <div class="card-body">
            <h5 class="card-title">{{ auth()->user()->username }}</h5>
            <hr style="height: 10px; color:gray" >
            <p class="card-text">
                Username: {{ auth()->user()->username }}
            </p>
{{--
            <p class="card-text">
                role: {{ auth()->user()->role }}
            </p>

            <p class="card-text">
                email: {{ auth()->user()->email }}
            </p>
            <p class="card-text">
                Phone Number: {{ auth()->user()->phone_number }}
            </p>
            <p class="card-text">
                Address: {{ auth()->user()->address }}
            </p>


            <div class="card-footer">
                @if(auth()->user()->role === 'member')
                    <a href="/changePassword/{{ auth()->user()->username }}" class="btn btn-danger">Change Password</a>

                @endif
                <a href="/home" class="btn btn-danger btn-primary">back</a> --}}
            </div>
        </div>


    </div>

@endsection
