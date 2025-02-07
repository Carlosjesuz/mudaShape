@extends('layout.master')
@section('content')
<div class="container mt-5">
    <form action="{{ route('medidas.atualizar', Auth::id()) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8 ">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="p-5 border border-dark text-center tamanho-div">
                            <p>braço</p>
                            <input type="text" name="braco" value="{{ $medida->braco ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="p-5 border border-dark text-center tamanho-div">
                            <p>peito</p>
                            <input type="text" name="peito" value="{{ $medida->peito ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="p-5 border border-dark text-center tamanho-div">
                            <p>abdome</p>
                            <input type="text" name="barriga" value="{{ $medida->barriga ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="p-5 border border-dark text-center tamanho-div">
                            <p>quadriceps</p>
                            <input type="text" name="coxa" value="{{ $medida->coxa ?? 'Não cadastrado' }}" >
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="p-5 border border-dark text-center tamanho-div">
                            <p>gluteo</p>
                            <input type="text" name="gluteo" value="{{ $medida->gluteo ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="p-5 border border-dark text-center tamanho-div">
                            <p>panturrilha</p>
                            <input type="text" name="panturrilha" value="{{ $medida->panturrilha ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="p-5 border border-dark text-center tamanho-div">
                            <p>peso</p>
                            <input type="text" name="peso" value="{{ $medida->peso ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="p-5 border border-dark text-center tamanho-div">
                            <p>idade</p>
                            <input type="text" name="idade" value="{{ $medida->idade ?? '' }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 border border-dark  text-center tamanho-card ">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($medida->sexo2 === 1 ? 'img/mulher.png' : 'img/homem.png') }}" alt="corpo">
                        <p>Medidas</p>
                    </a>
                </div>
            </div>
            <div  class="login-button bottom10">
                <button type="submit">Enviar</button>
            </div>
        </div>
    </form>
</div>
@endsection
