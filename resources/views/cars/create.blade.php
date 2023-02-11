@extends('layouts.admin')
@section('title', 'Newtec Wolksvagen | Painel administrativo!')

@section('content')
<div class="container mt-5">
	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h1 class="mb-3">Criando um novo carro.</h1>

			<form action="/cars" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="mb-3">
				  	<label for="name" class="form-label">Nome do carro</label>
				  	<input class="form-control" type="text" name="name" id="name">
				</div>


				<div class="mb-3">
				  	<label for="name" class="form-label">Categoria</label>
				  	<select class="form-control" name="category">
				  	@foreach ($categories as $category)
				  		<option value="{{ $category->id }}">{{ $category->name }}</option>
				  	@endforeach	
				  	</select>
				</div>

				<div class="mb-3">
				  	<label for="image" class="form-label">Imagem do carro</label>
				  	<input class="form-control" type="file" name="image" id="image">
				</div>
		        <input type="submit" class="btn btn-dark" value="Criar carro">
			</form>
		</div>
	</div>
</div>
@endsection