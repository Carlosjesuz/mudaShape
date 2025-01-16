@extends('layout.master')
@section('head')
@endsection
@section('content')
    <div class="container content-login">
        <form action="" class="login">
            <div class="login-div">
                <h2 class="h2">Login</h2>
                <div class="topo10 login-input">
                    <input type="email" placeholder="E-mail">
                </div>
                <div  class="topo10 login-input bottom10">
                    <input type="password" placeholder="senha">
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
