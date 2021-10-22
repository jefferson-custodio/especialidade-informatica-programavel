<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;
use App\Models\EspecialidadeCategoria;

class EspecialidadeController extends Controller
{
    public function index(Request $request)
    {

        $paginator = Especialidade::paginate(30);

        return view('especialidades.index', ['paginator'=>$paginator]);
    }
    
    public function create(Request $request)
    {
        $especialidade_categorias = EspecialidadeCategoria::get();

        return view('especialidades.form', ['especialidade_categorias'=>$especialidade_categorias]);
    }
    
    public function edit(Request $request, $id)
    {
        $especialidade = Especialidade::find($id);
        $especialidade_categorias = EspecialidadeCategoria::get();
        return view('especialidades.form', ['especialidade'=>$especialidade, 'especialidade_categorias'=>$especialidade_categorias]);
    }
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nome' => 'required',
            'especialidade_categoria_id' => 'required',
        ]);

        Especialidade::create([
            'nome'=>$request->nome,
            'especialidade_categoria_id'=>$request->especialidade_categoria_id
        ]);

        return redirect()->route('especialidades')->withStatus('Especialidade criada com sucesso!');
    }

    
    public function update(Request $request, $id)
    {

        $especialidade = Especialidade::find($id);
        if($request->hasFile('nome'))$especialidade->nome = $request->nome;
        if($request->hasFile('especialidade_categoria_id'))$especialidade->especialidade_categoria_id = $request->especialidade_categoria_id;
        $especialidade->save();

        return redirect()->route('especialidades')->withStatus("Especialidade #$id alterada com sucesso!");
    }
}
