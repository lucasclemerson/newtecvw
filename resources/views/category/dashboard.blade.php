@extends('layouts.admin')
@section('title', 'Newtec Wolksvagen | Painel administrativo!')

@section('content')
<div class="container mt-5">  

    <a class="btn btn-success mb-4" href="/categorys/create">
        Criar novo
    </a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Ação</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
        <tr>    
            <td scope="row">{{ $loop->index }}</td>
            <td>{{ $category->name }}</td>
            <td class="text-center"> 
                <button class="btn btn-info">
                    Editar 
                </button>

                <form class="d-inline-block" action="/category/{{ $category->id }}" method="POST">
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