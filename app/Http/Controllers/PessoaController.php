<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Hash;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $pessoas = Pessoa::all();
        return view('cadastro.listar', ['pessoas' => $pessoas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastro.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:pessoas',
            'cpf' => 'required|unique:pessoas',
            'senha' => 'required|min:6',
        ]);

        $pessoa = new Pessoa();
        $pessoa->name = $validatedData['nome'];
        $pessoa->email = $validatedData['email'];
        $pessoa->cpf = $validatedData['cpf'];
        $pessoa->senha = Hash::make($validatedData['usuario_id']); 
        $pessoa->save();
    
        return redirect()->route('cadastro.listar')->with('success', 'Cadastro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pessoas = Pessoa::findOrFail($id);
        return view('cadastro.editar', ['pessoas' => $pessoas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validatedData = $request->validate([
        //     'nome' => 'required|string|max:255',
        //     'cpf' => 'required|string|max:14|unique:pessoas,cpf,' . $id,
        //     'email' => 'required|email|max:255|unique:pessoas,email,' . $id,
        //     'senhaAntiga' => 'nullable|string|min:6', // Senha antiga é opcional
        //     'senha' => 'nullable|string|min:6|confirmed', // senha deve ser igual a confirmaSenha
        // ]);

    $pessoa = Pessoa::findOrFail($id);

    if ($request->filled('senhaAntiga')) {
        if (!password_verify($request->senhaAntiga, $pessoa->senha)) {
            return redirect()
                ->back()
                ->withErrors(['senhaAntiga' => 'A senha antiga não está correta.']);
        }

        if ($request->filled('senha')) {
            $pessoa->senha = bcrypt($request->senha);
        }
    }

    $pessoa->name = $request->nome;
    $pessoa->cpf = $request->cpf;
    $pessoa->email = $request->email;
    $pessoa->save();

    return redirect()
        ->route('cadastro.listar')
        ->with('success', 'Dados atualizados com sucesso!')
        ->with('error', 'A senha antiga não está correta.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pessoa = Pessoa::find($id);

        if (!$pessoa) {
            return redirect()->route('cadastro.listar')->with('error', 'Pessoa não encontrada.');
        }

        $pessoa->delete();

        return redirect()->route('cadastro.listar')->with('success', 'Pessoa deletada com sucesso!');
    }
}
