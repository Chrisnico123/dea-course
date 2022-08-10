@extends('layout/isGuest')

@section('content')
<div class="log">
    <div class="left">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide font"><h1>H</h1></div>
                <div class="swiper-slide font"><h1>E</h1></div>
                <div class="swiper-slide font"><h1>L</h1></div>
                <div class="swiper-slide font"><h1>L</h1></div>
                <div class="swiper-slide font"><h1>O</h1></div>
                <div class="swiper-slide font"><h1>HELLO!!!</h1></div>
            </div>
        </div>
    </div>
    <div class="right">
        <h1>Login :</h1>
        @include('toatsr')
        <form action= {{ route('login_action') }} method="POST" class="form">
            @csrf
            <input class="input m5" type="text" placeholder="Username" name="username">
            <br>
            <input class="input m5" type="password" placeholder="Password" name="password">
            <br>
            <button class="m5" type="submit">Login</button>
        </form>
    </div>
</div>

@endsection