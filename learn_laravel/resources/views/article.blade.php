@extends('layout/isGuest')
@section('content')
<div class="artikel">
    <div class="btn">
        <button><a href="/">Kembali</a></button>
    </div>
    <br>
    <h1>{{ $title }}</h1>
    <br>
    <div>
        <h3>{{ $article->title }}</h3>
        <br>
        <i>{{ $article->tag }}</i>
        <br>
        <p>{!! $article->description !!}</p>
        <br>
    </div>
</div>
@endsection