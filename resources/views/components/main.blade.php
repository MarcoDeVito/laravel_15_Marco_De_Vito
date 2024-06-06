<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recap Relazioni</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column h-100">
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 ">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="{{route("home")}}">
                        <img height="48px" src="/template/assets/book.png">
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    @guest
                    <a class="btn btn-sm btn-outline-secondary mx-2" href="{{route('login')}}">Entra</a>
                    <a class="btn btn-sm btn-outline-secondary mx-2" href="{{route('register')}}">Registrati</a>
                    @else
                    
                    <span>Benvenuto, <a href="{{route('pages.profile')}}">{{auth()->user()->name}}</a></span>
                    <form action="{{route('logout')}}" method="POST"><button type="submit" class="btn btn-sm btn-outline-secondary mx-2">
                        @csrf Logout</button></form>
                    @endguest
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-3 border-bottom">
            <x-navbar/>
        </div>
    </div>
    <main>
        {{ $slot }}
    </main>
    <footer class="footer py-5 mt-auto text-center text-body-secondary bg-body-tertiary">
        <p>Copyright</p>
    </footer>
</body>


</html>
