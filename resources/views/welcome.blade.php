@extends('layouts.auth')

@section('main-content')

<div class="container bg-gradient-primary pt-5">
    <div class="welcome-title text-center">
        <h1 style="color: white;font-weight:bold; font-size:50px;">welcome to <span style="color: #e1b87b">yotek</span> meeting room</h1><br>
        <p style="color: white">Sistem peminjaman ruangan yang mengatur <br>jadwal dan booking ruangan di PT.Yogura Tekindo</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-5 col-md-5">
            <a href="{{ route('home') }}">
            <div class="card o-hidden border-0 shadow-lg my-3">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12  d-lg-block bg-login-image text-center" style="margin: auto; padding:10%;">
                            <img src="{{ url('img/leftuser.svg') }}" style="max-width: 62.4%;" alt="">
                            <h4 style="font-weight: bold;padding-top:10%;">masuk sebagai user</h4>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-5">
            <a href="{{ route('login') }}">
            <div class="card o-hidden border-0 shadow-lg my-3">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12  d-lg-block bg-login-image text-center" style="margin: auto; padding:10%;">
                            <img src="{{ url('img/userright.svg') }}" style="max-width: 60%;" alt="">
                            <h4 style="font-weight: bold;padding-top:10%;">masuk sebagai admin</h4>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        
    </div>
</div>

@endsection
