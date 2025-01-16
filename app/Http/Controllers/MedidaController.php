<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medida;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medidas = Medida::all();
        return view('medidas.listar', ['medidas' => $medidas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pessoa = new Medida();
        $pessoa->name = $request->input('nome');
        $pessoa->email = $request->input('email');
        $pessoa->cpf = $request->input('cpf');
        $pessoa->cpf = $request->input('cpf');
        $pessoa->name = $request->input('nome');
        $pessoa->email = $request->input('email');
        $pessoa->cpf = $request->input('cpf');
        $pessoa->cpf = $request->input('cpf'); 
        $pessoa->name = $request->input('nome');
        $pessoa->email = $request->input('email');
        $pessoa->cpf = $request->input('cpf');
        $pessoa->cpf = $request->input('cpf');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
