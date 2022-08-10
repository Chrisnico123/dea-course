@extends('../layout/input1')
@section('content')
<div class="container">
    <i>{{ Session('message') }}</i>
    <h1>Input Data</h1>
    <form action={{ route('article_add_action') }} method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title" class="input">
        <br>
        {{-- <input type="text" name="description" placeholder="Description" class="input"> --}}
        <br>
        <input id="description" type="hidden" name="description">
        <trix-editor input="description" class="white"></trix-editor>
        <br>
        <input type="text" name="tag" placeholder="Tag" class="input">
        <br>
        <button class="input"type="submit">Create</button>
    </form>
</div>
@endsection