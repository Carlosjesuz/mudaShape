<?php

use App\Http\Controllers\{LoginController,PessoaController, MedidaController};
use App\Models\Medida;
use App\Models\Pessoa;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/cadastro', [PessoaController::class, 'create'])->name('cadastro');
Route::get('/login', [LoginController::class, 'index'])->name('login2');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/Logout', function () {
    Auth::logout();
    return redirect(route('login2'));
})->name('logout2');
Route::resource('pessoas', PessoaController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('/medidas/editar', [MedidaController::class, 'edit'])->name('medidas.editar');
    Route::post('/medidas/atualizar', [MedidaController::class, 'update'])->name('medidas.atualizar');
    Route::resource('medidas', MedidaController::class);
    Route::get('/home', [MedidaController::class, 'home'])->name('home');
    Route::get('/medidas', [MedidaController::class, 'create'])->name('cadastro.medidas');
    Route::get('/cadastro/editar/{id}', [PessoaController::class, 'edit'])->name('cadastro.editar');
    Route::get('/cadastro/lista', [PessoaController::class, 'index'])->name('cadastro.listar');
    Route::post('/cadastro/atualizar/{id}', [PessoaController::class, 'update'])->name('cadastro.atualizar');
    Route::delete('/cadastro/{id}', [PessoaController::class, 'destroy'])->name('cadastro.delete');
});