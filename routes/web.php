<?php

use App\Http\Controllers\{LoginController,PessoaController, MedidaController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cadastro', function () {
    return view('cadastro.cadastro');
});
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/medidas', function () {
    return view('cadastro.medidas');
});
Route::get('/medidas/edicao', function () {
    return view('cadastro.medidas-edicao');
});
Route::get('/cadastro/editar', function () {
    return view('cadastro.editar');
})->name('cadastro.editar');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/cadastro/editar/{id}', [PessoaController::class, 'edit'])->name('cadastro.editar');
Route::get('/cadastro/lista', [PessoaController::class, 'index'])->name('cadastro.listar');
Route::post('/cadastro/atualizar/{id}', [PessoaController::class, 'update'])->name('cadastro.atualizar');
Route::delete('/cadastro/{id}', [PessoaController::class, 'destroy'])->name('cadastro.delete');
Route::resource('pessoas', PessoaController::class);