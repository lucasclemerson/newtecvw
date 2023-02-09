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
        <link href=" {{ asset('css/header.css') }}" rel="stylesheet" type="text/css">
        <link href=" {{ asset('css/content.css') }}" rel="stylesheet" type="text/css">
        <link href=" {{ asset('css/button.css') }}" rel="stylesheet" type="text/css">
        <link href=" {{ asset('css/footer.css') }}" rel="stylesheet" type="text/css">
        <link href=" {{ asset('css/responsividade.css') }}" rel="stylesheet" type="text/css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="/js/script.js" type="text/javascript"></script>         
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
       
    </head>
    <body>
        {{--inicializando o cabeçario da página--}}
        <header class="container-fluid w-100 p-0 m-0">
            <ul class="lista-contato">
                <button class="btn-toggle" id="btn-toggle">
                    <i class="bi bi-list"></i>
                </button>

                <li class="item">
                    <img class="logomarca" src="{{ url('img/logomarca-vertical.png') }}">
                </li>

                <a target="_blank" href="https://www.google.com/maps/place/Newtec/@-6.4790613,-37.0703344,17z/data=!4m13!1m7!3m6!1s0x7afed00985e49f1:0x543e5810798017c1!2sNewtec!8m2!3d-6.4790613!4d-37.0681457!10e1!3m4!1s0x7afed00985e49f1:0x543e5810798017c1!8m2!3d-6.4790613!4d-37.0681457" class="btn btn-primary-blue hidden-now">
                   <ion-icon name="location-outline"></ion-icon>
                   Caicó, RN
                </a>

            </ul>
            <ul class="lista-opcoes">
                <li class="item hidden">
                    <a href="#">Novos</a>
                </li>

                <li class="item hidden">
                    <a href="#">Serviços</a>
                </li>
    
                <li class="item hidden">
                    <a href="#">Peças & Acessórios</a>
                </li>
    
                <li class="item hidden">
                    <a href="#">Contatos</a>
                </li>


                <li class="item hidden">
                    <a href="#">Fale conosco</a>
                </li>
    
                <button class="item btn-primary-blue hidden">
                    <i class="bi bi-calendar-week"></i>
                    Agendamento
                </button>
            </ul>
            <div></div>
        </header>

        {{-- inicializando o conteudo da página --}}
        @yield('content')

        {{-- inicializando o footer --}}
        <footer>
            <div class="apresentation">
                <img src="{{ url('img/logomarca-vertical.png') }}">
            </div>
            <div class="rodape">
                <div class="column">
                    <div class="title">
                        Redes sociais & Contato
                    </div>
    
                    <div class="lista">
                        <a target="_blank" href="https://instagram.com/newtecvw" class="item-rodape">
                            <i class="bi bi-instagram"></i>
                            @newtecvw
                        </a>
    
                        <a target="_blank" href="https://facebook.com/newteccaicooficial" class="item-rodape">
                            <i class="bi bi-facebook"></i>
                            /newteccaicooficial
                        </a>
    
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=5584991666406" class="item-rodape">
                            <i class="bi bi-whatsapp"></i>
                            (84) 99166-6406
                        </a>
    
                        <a href="tel:43211977" class="item-rodape">
                            <i class="bi bi-telephone"></i>
                            4321-1977
                        </a>
                    </div>
                </div>
    
                <div class="column">
                    <div class="title">
                        Funcionamento
                    </div>
    
                    <div class="lista">
                        <div class="item-rodape i-fixed">
                            <i class="bi bi-clock-history"></i>
                            Segunda a Sexta das 7:30h as 17:30h
                        </div>
    
                        <div class="item-rodape i-fixed">
                            <i class="bi bi-clock-history"></i>
                            Sábados das 7:30h as 11:30h
                        </div>
                    </div>
                </div>
    
                <div class="column">
                    <div class="title">
                        Localização
                    </div>
    
                    <div class="lista">
                        <a target="_blank" href="https://maps.app.goo.gl/5JMhHFAE8DMexvJm6?g_st=iw" class="item-rodape">
                            <i class="bi bi-geo-alt"></i>
                            Av. Cel. Martiniano, 3948 - Itans, Caicó - RN
                        </a>
                    </div>
                </div>
            </div>
            <div class="copyritgh">
                <p>©Copyright 2001-<?=date('Y')?> newtecvw.com.br - <strong>Todos os direitos reservados.</strong></p>
            </div>
    
            <div class="icone-whatsapp">
                <a target="_blank" href="https://api.whatsapp.com/send?phone=5584991666406">
                    <div class="container-text-icon">
                        <h2>CLIQUE AQUI E</h2>
                        <h1>CHAMA NO WHATSAPP</h1>
                    </div>
                    <img src="{{ asset('img/whatsapp.png')}}" alt="icone da rede social whatsapp">
                </a>
            </div>
        </footer>    
    </body>
</html>