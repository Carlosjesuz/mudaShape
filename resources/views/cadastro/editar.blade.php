@extends('layout.master')
@section('content')
    <div class="container content-login">
        <form action="{{ route('pessoas.update', $pessoas->id) }}" method="POST">

            @csrf
            @method('PUT') <!-- Garante que o método enviado seja PUT -->   

            <div class="login-div">
                <div class="medidas-photo">
                    <img src="https://via.placeholder.com/60" alt="Foto do Perfil">
                </div>
                <h2 class="h2">Cadastro</h2>
                <div class="topo10 login-input">
                    <input type="text" name="nome" value="{{ $pessoas->name}}" required>
                </div>
                <div class="topo10 login-input">
                    <input type="text" name="cpf" value="{{ $pessoas->cpf}}">
                </div>
                <div class="topo10 login-input">
                    <input type="email" name="email" value="{{ $pessoas->email}}" >
                </div>
                <div  class="topo10 login-input bottom10">
                    <input type="password" id="senhaAntiga" name="senhaAntiga" placeholder="Senha antiga" >
                    <i class="bi bi-eye-fill" id="btn-antiga" onclick="senhaPasssda()"></i>
                </div>
                <div  class="topo10 login-input bottom10">
                    <input type="password" id="primeiraSenha" name="senha" placeholder="senha" >
                    <i class="bi bi-eye-fill" id="btn-senha" onclick="mostraSenha()"></i>
                </div>
                <div  class="topo10 login-input bottom10">
                    <input type="password" id="confirma-senha" name="confirmaSenha" placeholder="confirme sua senha" >
                    <i class="bi bi-eye-fill" id="cof-senha" onclick="mostraSenha2()"></i>
                </div>
                <div  class="topo10 login-button bottom10">
                    <button type="submit">Enviar</button>
                </div>
            </div>
            <p id="errorMessage" style="color: red; display: none;">As senhas não correspondem.</p>
        </form>
        <script>
            document.getElementById('loginForm').addEventListener('submit', function(event) {
                var senha = document.getElementById('primeiraSenha').value;
                var confirmaSenha = document.getElementById('confirma-senha').value;

                if (senha !== confirmaSenha) {
                    event.preventDefault();
                    document.getElementById('errorMessage').style.display = 'block';
                } else {
                    document.getElementById('errorMessage').style.display = 'none';
                }
            });

            function senhaPasssda() {
                var senhaAntiga = document.getElementById('senhaAntiga');
                var btnAntiga = document.getElementById('btn-antiga');

                if (senhaAntiga.type === 'password') {
                    senhaAntiga.setAttribute('type', 'text');
                    btnAntiga.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
                } else {
                    senhaAntiga.setAttribute('type', 'password');
                    btnAntiga.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
                }
            }

            function mostraSenha() {
                var primeiraSenha = document.getElementById('primeiraSenha');
                var btnSenha = document.getElementById('btn-senha');

                if (primeiraSenha.type === 'password') {
                    primeiraSenha.setAttribute('type', 'text');
                    btnSenha.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
                } else {
                    primeiraSenha.setAttribute('type', 'password');
                    btnSenha.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
                }
            }

            function mostraSenha2() {
                var confirmaSenha = document.getElementById('confirma-senha');
                var cofSenha = document.getElementById('cof-senha');

                if (confirmaSenha.type === 'password') {
                    confirmaSenha.setAttribute('type', 'text');
                    cofSenha.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
                } else {
                    confirmaSenha.setAttribute('type', 'password');
                    cofSenha.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
                }
            }
        </script>
    </div>
@endsection
