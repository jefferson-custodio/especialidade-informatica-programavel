<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Custo;

class CustosController extends Controller
{
    public function index(Request $request)
    {

        $paginator = Custo::paginate(30);
        // dd($paginator );
        return view('custos.index', ['paginator'=>$paginator]);
    }
    
    public function create(Request $request)
    {
        return view('custos.form', []);
    }
    
    public function edit(Request $request, $id)
    {
        $custo = Custo::find($id);
        return view('custos.form', ['custo'=>$custo,]);
    }
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'valor' => 'required',
            'descricao' => 'required',
        ]);

        Custo::create([
            'valor'=>$request->valor,
            'descricao'=>$request->descricao,
        ]);

        return redirect()->route('custos')->withStatus('Registro de custos criado com sucesso!');
    }

    
    public function update(Request $request, $id)
    {

        $custo = Custo::find($id);
         if($request->hasFile('valor'))$custo->valor = $request->valor;
         if($request->hasFile('descricao'))$custo->descricao = $request->descricao;
        $custo->save();

        return redirect()->route('custos')->withStatus("Registro de Custo #$id alterado com sucesso!");
    }
}
