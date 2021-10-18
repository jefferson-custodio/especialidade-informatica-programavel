<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desbravador;
use App\Models\Unidade;

class DesbravadoresController extends Controller
{
    public function index(Request $request)
    {

        $paginator = Desbravador::paginate(30);

        return view('desbravadores.index', ['paginator'=>$paginator]);
    }
    
    public function create(Request $request)
    {
        $unidades = Unidade::get();

        return view('desbravadores.form', ['unidades'=>$unidades]);
    }
    
    public function edit(Request $request, $id)
    {
        $desbravador = Desbravador::find($id);
        $unidades = Unidade::get();
        return view('desbravadores.form', ['desbravador'=>$desbravador, 'unidades'=>$unidades]);
    }
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nome' => 'required',
            'email' => 'required',
        ]);

        Desbravador::create([
            'nome'=>$request->nome,
            'email'=>$request->email,
            'documento'=>$request->documento,
            'unidade_id'=>$request->unidade_id
        ]);

        return redirect()->route('desbravadores')->withStatus('Desbravador criado com sucesso!');
    }

    
    public function update(Request $request, $id)
    {

        $desbravador = Desbravador::find($id);
        $desbravador->nome = $request->nome;
        $desbravador->email = $request->email;
        $desbravador->documento = $request->documento;
        $desbravador->unidade_id = $request->unidade_id;
        $desbravador->save();

        return redirect()->route('desbravadores')->withStatus("Desbravador #$id alterado com sucesso!");
    }
}
