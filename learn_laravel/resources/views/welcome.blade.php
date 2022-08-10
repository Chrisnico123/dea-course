@extends('layout/isGuest')
@section('content')
    <br>
    <div class="container">
        @foreach ($data as $item)
        <div class="item">
            <h1>{{ $item->title }}</h1>
            <button class="detail">
                <a href="/article/{{ $item->id }}">Detail</a>
            </button>
        </div>
        @endforeach
    </div>
@endsection