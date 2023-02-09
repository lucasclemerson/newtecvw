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

        @foreach ($files as $imagem)
        <div class="slider">
            @if ($loop->index==0 || $loop->index==1)
                <video autoplay controls id="video-carousel{{ $loop->index }}" class="video-preview" src="/videos/{{$imagem}}">
                </video> 
            @else
            <img class="imagem-preview" src="/img/carousel/{{ $imagem }}" alt="Imagem {{ $imagem }}">
            @endif
            <input id="input{{$loop->index}}" class="image-select" type="radio">
        </div>
        @endforeach
        
        <div class="container-dots">
            @foreach ($files as $key=>$imagem)    
            <input @if($key==0) checked @endif id="input{{$key}}" class="image-select" type="radio">
            @endforeach
        </div>

        <img class="gif-down-page" src="/gifs/down.gif" alt="Gif para descer a página">
        <img class="gif-down-page" src="/gifs/down.gif" alt="Gif para descer a página">
    </div>
</main>
@endsection