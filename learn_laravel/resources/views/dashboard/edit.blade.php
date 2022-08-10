<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>
    <link rel="stylesheet" href="/input.css">
    <link rel="stylesheet" type="text/css" href="/trix.css">
    <script type="text/javascript" src="/trix.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
    <div>
        <header class="nav">
            <a href="/">HOME</a>
            <button><a href="/dashboard">Dashboard</a></button>
        </header>
    </div>
    <div class="container">
        <h1>Input Data</h1>
        <form action={{ route('article_update_action') }} method="POST">
            @csrf
            <input id="id" type="hidden" name="id" value="{{ $id }}">
            <input id="title" type="text" value="{{ $title }}" name="title" class="input">
            <br>
            <br>
            <input id="description" value="{{  $description  }}" type="hidden" name="description">
            <trix-editor id="description" input="description" class="white"></trix-editor>
            <br>
            <input id="tag" type="text" value="{{ $tag }}" name="tag" class="input">
            <button class="input"type="submit">Update</button>
        </form>
    </div>
</body>
</html>