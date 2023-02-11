@extends('layouts.admin')
@section('title', 'Newtec Wolksvagen | Painel administrativo!')

@section('content')
<div class="container mt-5">  

    <a class="btn btn-success mb-4" href="/cars/create">
        Criar novo
    </a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Carro</th>
                <th scope="col">Imagem</th>
                <th scope="col">Categoria</th>
                <th scope="col">Criador</th>
                <th scope="col">Ultima atualização</th>
                <th scope="col" class="text-center">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cars as $car)
        <tr>    
            <td scope="row">{{ $loop->index }}</td>
            <td>{{ $car->name }}</td>
            <td><img height="50" width="50" src="/img/carros/{{ $car->image }}" alt="Carro {{ $car->name }}"></td>
            <td>{{ $car->category->name }}</td>
            <td>{{ $criadores[$loop->index] }}</td>
            <td>{{ $car->last_update }}</td>
            <td class="text-center"> 
                <button class="btn btn-info">
                    Editar 
                </button>

                <form class="d-inline-block" action="/cars/{{ $car->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Excluir
                    </button>
                </form>             
            </td> 
        </tr> 
        @endforeach
        </tbody>
    </table>
</div>
@endsection