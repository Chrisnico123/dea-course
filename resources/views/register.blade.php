@extends('layout/isGuest')
@section('content') 
    <div class="center">
        @include('toatsr')
        @error('username')
            {{ $message = 'Username Sudah ada' }}
        @enderror
        @error('password')
            {{ $message = 'password salah' }}
        @enderror
        @error('repassword')
            {{ $message = 'password salah'}}
        @enderror
        <h2>Register Now!!!</h2>
        <form action={{ route('register_acc') }} method="POST"> 
            @csrf
            <input class="input m5 full" type="text" placeholder="Username" name="username">
            <br>
            <input class="input m5 full" type="password" placeholder="Create Password" name="password">
            <br>
            <input class="input m5 full" type="password" placeholder="Confirm Password" name="repassword">
            <br>
            <button class="input m5 full" type="submit">Register</button>
        </form>
    </div>
@endsection