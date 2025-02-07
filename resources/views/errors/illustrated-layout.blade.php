@extends('layout.master')

@section('content')
<div class="container text-center mt-5">
    <h1 class="display-4">{{ $exception->getStatusCode() }}</h1>
    <p class="lead">Ocorreu um erro: {{ $exception->getMessage() ?: 'Erro inesperado.' }}</p>
    <a href="{{ route('home') }}" class="btn btn-secondary">Voltar para a Home</a>
</div>
@endsection