@extends('layouts.main')
@section('title', 'Newtec Wolksvagen | Sua concessionária Volkscagen na região!')

@section('content')
<main>
    @php
        $list_imagens = array('banner-1.jpg', 'banner-2.png', 'banner-3.jpg');
    @endphp

    <div class="main-carousel">
        <button class="btn-prev"><ion-icon name="chevron-back-outline" color="white" size="large"></ion-icon></button>
        <button class="btn-next"><ion-icon name="chevron-forward-outline" color="white" size="large"></ion-icon></button>

        @foreach ($list_imagens as $imagem)
        <div class="slider">
            <img class="imagem-preview" src="/img/carousel/{{ $imagem }}" alt="Imagem">
        </div>
        @endforeach
        
        <div class="container-dots">
            @foreach ($list_imagens as $key=>$imagem)    
            <input @if($loop->index==0) checked="checked" @endif id="input{{$key}}" class="image-select" type="radio">
            @endforeach
        </div>
        

        <img class="gif-down-page" src="/gifs/down.gif" alt="Gif para descer a página">
    </div>
</main>
@endsection