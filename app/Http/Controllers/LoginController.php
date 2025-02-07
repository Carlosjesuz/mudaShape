<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Medida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pessoa;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('login.login');
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
        //
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
    
    public function login(Request $request){

        $email= $request->email;
        $password=$request->senha;
        
        if( Auth::attempt(['email' => $email, 'password' => $password])){
            $user = Auth::user(); 
            $medidaExiste = Medida::where('user_id', $user->id)->exists();
            if (!$medidaExiste) {
                return view('cadastro.medidas');
            }
            return redirect(route('home'));
        }else{
            DD($email);
        }
    }
}
