<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClassesController extends Controller
{
    public function index(Request $request)
    {

        $paginator = Classe::paginate(30);
        // dd($paginator );
        return view('classes.index', ['paginator'=>$paginator]);
    }
    
    public function create(Request $request)
    {
        return view('classes.form', []);
    }
    
    public function edit(Request $request, $id)
    {
        $classe = Classe::find($id);
        return view('classes.form', ['classe'=>$classe]);
    }
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nome' => 'required',
        ]);

        Classe::create([
            'nome'=>$request->nome
        ]);

        return redirect()->route('classes')->withStatus('Classe criada com sucesso!');
    }

    
    public function update(Request $request, $id)
    {

        $classe = Classe::find($id);
        $classe->nome = $request->nome;
        $classe->save();

        return redirect()->route('classes')->withStatus("Classe #$id alterada com sucesso!");
    }
}
