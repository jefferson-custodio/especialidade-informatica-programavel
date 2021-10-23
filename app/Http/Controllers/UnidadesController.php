<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;

class UnidadesController extends Controller
{
    public function index(Request $request)
    {

        $paginator = Unidade::paginate(30);
        // dd($paginator );
        return view('unidades.index', ['paginator'=>$paginator]);
    }
    
    public function create(Request $request)
    {
        return view('unidades.form', []);
    }
    
    public function edit(Request $request, $id)
    {
        $unidade = Unidade::find($id);
        return view('unidades.form', ['unidade'=>$unidade]);
    }
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nome' => 'required',
        ]);

        Unidade::create([
            'nome'=>$request->nome
        ]);

        return redirect()->route('unidades')->withStatus('Unidade criada com sucesso!');
    }

    
    public function update(Request $request, $id)
    {

        $unidade = Unidade::find($id);
        if($request->has('nome'))$unidade->nome = $request->nome;
        $unidade->save();

        return redirect()->route('unidades')->withStatus("Unidade #$id alterada com sucesso!");
    }

}
