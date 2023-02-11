@extends('layouts.admin')
@section('title', 'Newtec Wolksvagen | Painel administrativo!')

@section('content')
<div class="container mt-5">
	<div class="row justify-content-md-center">
		<div class="col-md-8">
			<h1 class="mb-3">Criando uma nova categoria.</h1>

			<form action="/categorys" method="POST">
				@csrf
				<div class="mb-3">
				  	<label for="name" class="form-label">Nome da categoria</label>
				  	<input class="form-control" type="text" name="name" id="name">
				</div>
		        <input type="submit" class="btn btn-dark" value="Criar categoria">
			</form>
		</div>
	</div>
</div>
@endsection