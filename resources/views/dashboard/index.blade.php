@extends('layout/isUser')
@section('content')
    <br>
    <div class="container">
        @include('toatsr')
        @foreach ($data as $item)
        <div class="card">
                <div class="item">
                <h2>{{ $item->title }}</h2>
                <i>{{ $item->tag }}</i>
                <p>{!! $item->description !!}</p>
            </div>
                <div class="right">
                    <button class="yellow"><a href="/article/edit/{{ $item->id }}">Edit</a></button>
                    <form action={{ route('article_delete_action') }} method="POST">
                        @csrf
                        <input type="hidden" name="id" value={{ $item->id }}>
                        <button type="submit" class="red">Delete</button>
                    </form>
                </div>
            </div>
            <br>
        @endforeach
    </div>
@endsection