@extends('layouts.main')
@section('title')
    <title>{{ auth()->user()->username }}</title>
@endsection

@section('container')



@if(session()->has('editPasswordSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('editPasswordSuccess') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('editProfileSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('editProfileSuccess') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('loginError') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section class="section">
    <div class="card detail">
        {{-- <div class="card-img">
        <img src="{{ $item->image }}" class="card-img-top" alt="...">
        </div> --}}
        <h1> My Profile </h1>

        <div class="card-body">
            <div class="card-text" id="role">
                <p >
                    {{ auth()->user()->role }}
                </p>
            </div>

            <p class="card-text">
               <b> Username: {{ auth()->user()->username }}</b>
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

                <a href="/editProfile/{{ auth()->user()->username }}" class="btn btn-primary" id="profile">Edit Profile</a>

                @if(auth()->user()->role === 'member')
                    <a href="/editPassword/{{ auth()->user()->username }}" class="btn btn-primary" id="pw">Edit Password</a>
                @endif
            </div>
        </div>
    </div>

    <style>
        .section{
            display : flex;
            justify-content: center;
            align-content: center;
            text-align: center;
            flex-direction: row;
        }
        .detail{
            width: 850px;
            display: flex;
            flex-direction: column;
        }
        .card-text{

        }
        #pw{
            background-color: white;
            border-color: rgb(96, 159, 241);
            color: rgb(96, 159, 241);
        }
        #role{
            background-color: gray;
            margin-left: auto;
            margin-right: auto;
            height: 35px;
            width: 150px;
            color: white;
            font-size: small
            border-radius: 3px 3px 3px 3px;
            -moz-border-radius: 3px 3px 3px 3px;
            -webkit-border-radius: 3px 3px 3px 3px;
        }
    </style>

@endsection
