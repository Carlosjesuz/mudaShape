@extends('layout.master')
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Lado esquerdo com 4 divs -->
        <div class="col-md-8 ">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="p-5 border border-dark text-center tamanho-card">
                        <p>Peso</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="p-5 border border-dark text-center tamanho-card">
                        <p>gasto calorico</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="p-5 border border-dark text-center tamanho-card">
                        <p>proteina por dia</p>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="p-5 border border-dark text-center tamanho-card">
                        <p>IMC</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 border border-dark  text-center tamanho-card ">
                <img src="{{ asset('img/homem.png') }}" alt="Descrição da imagem">
                <p>Medidas</p>
            </div>
        </div>
    </div>
</div>
@endsection
