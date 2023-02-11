<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link href=" {{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <body>

        @if (session('msg'))
            <script type="text/javascript">
                alert("{{ session('msg') }}");
            </script>
        @endif

        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
 
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-light active" aria-current="page" href="/">
                            <i class="bi bi-chevron-left"></i>
                            Página do cliente</a>
                        </li>
                      
                        <li class="nav-item">
                            <a class="nav-link text-light active" aria-current="page" href="/cars">Carros</a>
                        </li>
                      
                        <li class="nav-item">
                            <a class="nav-link text-light active" aria-current="page" href="/categorys">Categorias</a>
                        </li>
                      
                    </ul>

                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a 
                                href="/logout" 
                                class="nav-link" 
                                onClick="
                                    event.preventDefault();
                                    this.closest('form').submit();"
                            >Sair</a>
                        </form>
                    </li>

                    <button disabled class="navbar-brand text-light">
                        {{ auth()->user()['name']}}
                    </button>
                                 
                    <form action="/logout" method="POST" class="d-flex" role="search">
                        @csrf
                        <a 
                            href="/logout" 
                            class="btn btn-outline-danger" 
                            onClick="
                                event.preventDefault();
                                this.closest('form').submit();"
                        >logout</a>
                    </form>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="mt-5 mb-5 text-center">
            <p>&copy{{ date('Y') }} Newtec VW, Todos os direitos reservados.</p> 
        </footer>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>