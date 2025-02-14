<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medida;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medidas = Medida::all();
        return view('cadastro.medidas', ['medidas' => $medidas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastro.medidas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $medida = new Medida();
        $medida->user_id = Auth::id();
        $medida->sexo1 = $request->input('sexo1') === 'homem' ? 1 : 0;
        $medida->sexo2 = $request->input('sexo2') === 'mulher' ? 1 : 0;
        $medida->braco = $request->input('braco');
        $medida->peito = $request->input('peito');
        $medida->barriga = $request->input('barriga');
        $medida->coxa = $request->input('coxa');
        $medida->gluteo = $request->input('gluteo'); 
        $medida->panturrilha = $request->input('panturrilha');
        $medida->peso = $request->input('peso');
        $medida->altura = $request->input('altura');
        $medida->idade = $request->input('idade');
        $medida->save();
    
        return redirect()->route('home')->with('success', 'Cadastro criado com sucesso!');
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
    public function edit()
    {
        $userId= Auth::id();
        $medida = Medida::where('user_id', $userId)->latest()->first();
        if (!$medida) {
            return redirect()->route('home')->with('error', 'Nenhuma medida encontrada para este usuário.');
        }
        return view('cadastro.medidas-edicao', compact('medida'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validacao = $request->validate([
            'braco' => ['nullable', 'numeric', 'between:10,80'], //  10cm e 80cm
            'peito' => ['nullable', 'numeric', 'between:30,200'],
            'barriga' => ['nullable', 'numeric', 'between:30,200'],
            'coxa' => ['nullable', 'numeric', 'between:20,100'],
            'gluteo' => ['nullable', 'numeric', 'between:20,150'],
            'panturrilha' => ['nullable', 'numeric', 'between:10,60'],
            'peso' => ['required', 'numeric', 'between:20,300'], // 20kg e 300kg
            'idade' => ['required', 'integer', 'between:10,90'], // 10 e 90 anos
        ],[
            'braco.between'=>"O braço precisa ter de 10cm até 80cm",
            'peito.between'=>"O braço precisa ter de 10cm até 80cm",
            'barriga.between'=>"O braço precisa ter de 10cm até 80cm",
            'coxa.between'=>"O braço precisa ter de 10cm até 80cm",
            'gluteo.between'=>"O braço precisa ter de 10cm até 80cm",
            'panturrilha.between'=>"O braço precisa ter de 10cm até 80cm",
            'peso.between'=>"O braço precisa ter de 10cm até 80cm",  
            'peso.between'=>"O braço precisa ter de 10cm até 80cm"     
        ]);

        

        $userId= Auth::id();
        $medidaAntiga = Medida::where('user_id', $userId)->latest()->first();

        $medida = new Medida();
        $medida->user_id = Auth::id();
        $medida->sexo1 = $medidaAntiga ? $medidaAntiga->sexo1 : ($request->input('sexo1') === 'homem' ? 1 : 0);
        $medida->sexo2 = $medidaAntiga ? $medidaAntiga->sexo2 : ($request->input('sexo2') === 'mulher' ? 1 : 0);
        $medida->braco = $request->input('braco');
        $medida->peito = $request->input('peito');
        $medida->barriga = $request->input('barriga');
        $medida->coxa = $request->input('coxa');
        $medida->gluteo = $request->input('gluteo'); 
        $medida->panturrilha = $request->input('panturrilha');
        $medida->peso = $request->input('peso');
        $medida->altura = $medidaAntiga ? $medidaAntiga->altura : $request->input('altura');
        $medida->idade = $request->input('idade');
        $medida->save();

        return redirect()->route('home')->with('success', 'Nova medida cadastrada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function home()
    {
        $medida = Medida::where('user_id', Auth::id())->latest()->first();

        $imc = null;
        $gastoCalorico = null;
        $proteina = null;

        if ($medida) {
            if ($medida->altura > 0 && $medida->peso > 0) {
                $imc = $medida->peso / ($medida->altura * $medida->altura);
            }

            if ($medida->peso > 0) {
                $proteina = $medida->peso * 1.5;
            }

            if ($medida->sexo1 === 1) { // Homem
                $gastoCalorico = 66 + (13.7 * $medida->peso) + (5.0 * $medida->altura ) - (6.8 * $medida->idade);
            } elseif ($medida->sexo2 === 1) { // Mulher
                $gastoCalorico = 665 + (9.6 * $medida->peso) + (1.8 * $medida->altura ) - (4.7 * $medida->idade);
            }
        }

        $imcFormatado = substr(str_replace('.', '', (string) $imc), 3);

        return view('home', compact('medida', 'imcFormatado', 'gastoCalorico', 'proteina'));
    }
}
