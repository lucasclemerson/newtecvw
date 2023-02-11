@extends('layouts.main')
@section('title', 'Newtec Wolksvagen | Sua concessionária Volkscagen na região!')

@section('content')
<main>
    @php
        $files = array('vd-1.mp4', 'vd-2.mp4', 'banner-1.jpg', 'banner-2.jpg', 'banner-3.jpg', 'banner-4.jpg');
    @endphp

    <div class="main-carousel">
        <button class="btn-prev"><ion-icon name="chevron-back-outline" color="white" size="large"></ion-icon></button>
        <button class="btn-next"><ion-icon name="chevron-forward-outline" color="white" size="large"></ion-icon></button>

        @foreach ($files as $file)
        <div class="slider">
            @if ($loop->index==0 || $loop->index==1)
                <video id="video-carousel{{ $loop->index }}" class="video-preview" src="/videos/{{$file}}" controls autoplay loop>
                </video> 
            @else
            <img class="imagem-preview" src="/img/carousel/{{ $file }}" alt="Imagem {{ $file }}">
            @endif
        </div>
        @endforeach
        
        <div class="container-dots">
            @foreach ($files as $f)    
                <div class="file-select @php if($loop->index==0){echo 'checked';} @endphp"></div>
            @endforeach
        </div>

        <img class="gif-down-page" src="/gifs/down.gif" alt="Gif para descer a página">
        <img class="gif-down-page" src="/gifs/down.gif" alt="Gif para descer a página">
    </div>


    {{-- list the cars --}}
    <div class="lista-carros">
        <div class="title-body">
            <h2>Um novo tempo. <h1>Uma nova Pollo Volkswagen</h1>.</h2>        
            <div class="container-search">
                <form action="/" method="GET">
                    @csrf
                    <div class="form-group">
                        <input value="{{ $search }}" class="form-control" type="text" name="search" id="search" placeholder="Qual carro conbina mais com você?">
                    </div>    
                </form>
            </div>
            
            <div class="container-categorias">
                <ul>
                    <li><a class="ancor-category @if ($search=='') ancor-ativo @endif" href="/"> Todos os veiculos</a></li>
                   
                    <li><a class="ancor-category @if ($search=='Pick-up') ancor-ativo @endif" href="/p?seach=Pick-up">Pick-up</a></li>
                    <li><a class="ancor-category @if ($search=='Sedan') ancor-ativo @endif" href="/?seach=Sedan">Sedan</a></li>
                    <li><a class="ancor-category @if ($search=='Hatch') ancor-ativo @endif" href="/?seach=Hatch">Hatch</a></li>     
                  
               </ul>

            </div>
         </div>

        <div class="container-carros">        
            @foreach ($cars as $car)
            <div class="carro shadow-lg">
                <figure>
                    <img src="/img/carros/{{ $car->image }}" alt="Imagem do carro {{ $car->name }}">
                    <figcaption>{{ $car->name }}</figcaption>
                </figure>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection