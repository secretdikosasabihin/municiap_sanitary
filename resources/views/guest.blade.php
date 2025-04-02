<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @include('style')
    
    <style>
        .hello{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body{
            height: 100vh;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="auth">
        @auth
            {{ Auth::user()->name }}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout" type="submit">
                    <span>Logout</span>
                    <div class="top"></div>
                    <div class="left"></div>
                    <div class="bottom"></div>
                    <div class="right"></div>

                </button>
            </form>
        @else
            @if(Route::has('login'))
                <a href="{{ route('login') }}">Login</a>
            @endif
        @endauth
    </div>
    <div class="hello">
     <h1>Hello my friend</h1>

    </div>
    




</body>

</html>