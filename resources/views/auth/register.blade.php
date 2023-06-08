@extends('layouts.app', ['class' => 'login-page', 'page' => _('Login Page'), 'contentClass' => 'login-page'])

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="text-center pt-5">
            <h1 class="font-weight-bold">Register to Your Account</h1>
        </div>
        <div class="row">
            <div class="col-md-6 text-right">
                <a href="{{ url('auth/facebook') }}"><img src="{{asset('facebook.png')}}" style="height:60px;width:60px" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="{{ url('auth/twitter') }}"><img src="{{asset('twitter.png')}}" style="height:60px;width:60px" alt=""></a>
            </div>
        </div>
        <br>
        <form method="POST" action="{{ route('register') }}">
        @csrf
            <div class="input-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="tim-icons icon-single-02"></i>
                    </div>
                </div>
                <input type="name" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Username') }}">
                @include('alerts.feedback', ['field' => 'name'])
            </div>
            <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="tim-icons icon-email-85"></i>
                    </div>
                </div>
                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email') }}">
                @include('alerts.feedback', ['field' => 'email'])
            </div>
            <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="tim-icons icon-lock-circle"></i>
                    </div>
                </div>
                <input type="password" placeholder="{{ _('Password') }}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                @include('alerts.feedback', ['field' => 'password'])
            </div>
            <div class="text-center">
                <p class="font-weight-bold">FORGET PASSWORD?</p>
            </div>
            <div class="text-center mt-5" >
                <button class="btn btn-pink">Sign UP</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="bg-image" 
        style="background-image: url({{asset('image1.png')}});
               height: 70vh">
            <div class="text-center p-5">
            </br>
                </br>
                </br>
</br>
                <h1 class="font-weight-bold">Welcome Back ! </h1>
                <h2 class="font-weight-bold">Make your</h2>
                <h2 class="font-weight-bold">project <span style="color:green">faster</span> </h2>
            </div>
            <div class="text-center mt-5" >
                <div class="row align-items-end">
                    <div class="col">
                        <a href="{{ route('login') }}" class="btn btn-pink">Sign IN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
