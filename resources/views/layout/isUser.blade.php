<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD - LARAVEL</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
    <div>
        <header class="nav">
            <a href="/">HOME</a>
            <div class="right">
                <button class="same"><a href="/dashboard/input">Input</a></button>
                <form action={{ route('dashboard_logout') }} method="POST">
                    @csrf
                    <input type="hidden" name="token" value={{ $user_token->token }}>
                    <button class="same" type="submit" class="btnlog">Logout</button>
                </form>
            </div>
        </header>
        <div>
            @yield('content')
        </div>
    </div>
</body>
</html>