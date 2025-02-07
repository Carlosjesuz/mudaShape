@extends('layout.master')
@section('content')
    <div class="container content-login">
            <form action="{{ route('medidas.store') }}" method="POST">

            @csrf

            <div class="medida-div">
                <h2 class="h2 topo10">Medidas</h2>
                <div class="d-flex align-items-center mb-3">
                    <label class="me-2">
                        <input type="radio" name="sexo1" value="homem" >
                        Homem
                    </label>
                    <label class="ms-3">
                        <input type="radio" name="sexo2" value="mulher" >
                        Mulher
                    </label>
                </div>
                <div class="topo10 login-input">
                    <input type="number" name="braco" placeholder="biceps" value="" >
                </div>
                <div class="topo10 login-input">
                    <input type="number" name="peito" placeholder="Peitoral" value="" >
                </div>
                <div class="topo10 login-input">
                    <input type="number" name="barriga" placeholder="Abdomem" value="" >
                </div>
                <div class="topo10 login-input">
                    <input type="number" name="coxa" placeholder="Quadriceps" value="" >
                </div>
                <div class="topo10 login-input">
                    <input type="number" name="gluteo" placeholder="Gluteo" value="" >
                </div>
                <div class="topo10 login-input">
                    <input type="number" name="panturrilha" placeholder="Panturrilha" value="" >
                </div>
                <div class="topo10 login-input">
                    <input type="number" name="peso" placeholder="Peso" value="" >
                </div>
                <div class="topo10 login-input">
                    <input type="number" name="altura" placeholder="Altura" value="" >
                </div>
                <div class="topo10 login-input">
                    <input type="number" name="idade" placeholder="Idade" value="" >
                </div>
                <div  class="topo10 login-button bottom10">
                    <button type="submit">Enviar</button>
                </div>
            </div>
        </form>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const sexoHomem = document.querySelector('input[name="sexo1"]');
                const sexoMulher = document.querySelector('input[name="sexo2"]');

                sexoHomem.addEventListener("change", function () {
                    if (this.checked) {
                        sexoMulher.checked = false;
                    }
                });

                sexoMulher.addEventListener("change", function () {
                    if (this.checked) {
                        sexoHomem.checked = false;
                    }
                });
            });
        </script>
    </div>
@endsection
