<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caixa;

class CaixaController extends Controller
{
    public function index(Request $request)
    {

        $paginator = Caixa::paginate(30);
        // dd($paginator );
        return view('caixa.index', ['paginator'=>$paginator]);
    }
    
    public function create(Request $request)
    {
        return view('caixa.form', []);
    }
    
    public function edit(Request $request, $id)
    {
        $caixa = Caixa::find($id);
        return view('caixa.form', ['caixa'=>$caixa,]);
    }
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'valor' => 'required',
            'data' => 'required',
            'descricao' => 'required',
        ]);

        Caixa::create([
            'valor'=>$request->valor,
            'data'=>$request->data,
            'descricao'=>$request->descricao,
        ]);

        return redirect()->route('caixa')->withStatus('Registro de caixa criado com sucesso!');
    }

    
    public function update(Request $request, $id)
    {

        $caixa = Caixa::find($id);
        if($request->has('valor'))$caixa->valor = $request->valor;
        if($request->has('data'))$caixa->data = $request->data;
        if($request->has('descricao'))$caixa->descricao = $request->descricao;
        $caixa->save();

        return redirect()->route('caixa')->withStatus("Registro de Caixa #$id alterado com sucesso!");
    }
}
