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


    <div class="lista-carros">
        <div class="title-body">
            <h2>Um novo tempo. <h1>Uma nova Pollo Volkswagen</h1>.</h2>        
        </div>

        @php 
            print_r($carros);
        @endphp

    </div>
</main>
@endsection