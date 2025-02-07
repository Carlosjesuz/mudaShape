@extends('layout.master')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 ">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="p-5 border border-dark text-center tamanho-card">
                        <p>Peso</p>
                        <p>{{ $medida->peso ?? '' }}kg</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="p-5 border border-dark text-center tamanho-card">
                        <p>gasto calorico diário</p>
                        <p>{{ $gastoCalorico ?? 'Não calculado' }}</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="p-5 border border-dark text-center tamanho-card">
                        <p>proteina por dia</p>
                        <p>{{ $proteina ?? 'Não calculado' }}</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="p-5 border border-dark text-center tamanho-card">
                        <p>IMC</p>
                        <p>{{ substr($imcFormatado ?? '', 0, 4) ?: 'Não calculado' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <a href="{{ route('medidas.editar', Auth::id()) }}">
                <div class="p-3 border border-dark  text-center tamanho-card ">
                    <img src="{{ asset($medida->sexo2 === 1 ? 'img/mulher.png' : 'img/homem.png') }}" alt="corpo">
                    <p>Medidas</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
