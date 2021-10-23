<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensalidade;
use App\Models\Desbravador;

class MensalidadesController extends Controller
{
    public function index(Request $request)
    {

        $paginator = Mensalidade::with('desbravador')->paginate(30);
        // dd($paginator );
        return view('mensalidades.index', ['paginator'=>$paginator]);
    }
    
    public function create(Request $request)
    {
        $desbravadores = Desbravador::get();
        return view('mensalidades.form', ['desbravadores'=>$desbravadores]);
    }
    
    public function edit(Request $request, $id)
    {
        $mensalidade = Mensalidade::find($id);
        $desbravadores = Desbravador::get();
        return view('mensalidades.form', ['mensalidade'=>$mensalidade,'desbravadores'=>$desbravadores]);
    }
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'desbravador_id' => 'required',
            'valor' => 'required',
            'data' => 'required',
        ]);

        Mensalidade::create([
            'desbravador_id'=>$request->desbravador_id,
            'valor'=>$request->valor,
            'data'=>$request->data,
        ]);

        return redirect()->route('mensalidades')->withStatus('Mensalidade criada com sucesso!');
    }

    
    public function update(Request $request, $id)
    {

        $unidade = Mensalidade::find($id);
        if($request->has('desbravador_id'))$unidade->desbravador_id = $request->desbravador_id;
        if($request->has('valor'))$unidade->valor = $request->valor;
        if($request->has('data'))$unidade->data = $request->data;
        $unidade->save();

        return redirect()->route('mensalidades')->withStatus("Mensalidade #$id alterada com sucesso!");
    }
}
