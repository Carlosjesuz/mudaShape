@extends('layout.master')
@section('head')
@endsection
@section('content')
    <div class="container content-login">
        <form action="{{ route('login') }}" method="POST" class="login">
            @csrf
            <div class="login-div">
                <h2 class="h2">Login</h2>
                <div class="topo10 login-input">
                    <input type="email" name="email" id="email" placeholder="E-mail">
                </div>
                <div  class="topo10 login-input bottom10">
                    <input type="password" name="senha" id="senha" placeholder="senha">
                </div>
                <div  class="topo10 login-button bottom10">
                    <button>Enviar</button>
                </div>
                <p onclick="window.location.href='/cadastro'" class="btn-cadastro">
                    Cadastre-se
                </p>
            </div>
        </form>
    </div>
@endsection
