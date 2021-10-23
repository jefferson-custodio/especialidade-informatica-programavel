<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ato;

class AtosController extends Controller
{
    public function index(Request $request)
    {

        $paginator = Ato::paginate(30);
        // dd($paginator );
        return view('atos.index', ['paginator'=>$paginator]);
    }
    
    public function create(Request $request)
    {
        return view('atos.form', []);
    }
    
    public function edit(Request $request, $id)
    {
        $ato = Ato::find($id);
        return view('atos.form', ['ato'=>$ato,]);
    }
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'arquivo' => 'required|mimes:pdf,docx|max:2048',
        ]);
        // dd($request->arquivo);
        $url = '';
        
        if ($request->hasFile('arquivo')) {
            $extension = $request->arquivo->extension();
             $filename = $validated['titulo']."-".time().".".$extension;
            $request->arquivo->storeAs('/public', $filename);
            $url = \Storage::url($filename);
        }

        Ato::create([
            'titulo'=>$request->titulo,
            'descricao'=>$request->descricao,
            'arquivo'=>$url,
        ]);

        return redirect()->route('atos')->withStatus('Registro de atos criado com sucesso!');
    }
    
    public function update(Request $request, $id)
    {

        $ato = Ato::find($id);
        if($request->has('titulo')) $ato->titulo = $request->titulo;
        if($request->has('descricao')) $ato->descricao = $request->descricao;

         if ($request->hasFile('arquivo')) {
            $extension = $request->arquivo->extension();
            $filename = $ato->titulo."-".time().".".$extension;
            $request->arquivo->storeAs('/public',  $filename);
            $url = \Storage::url( $filename);
            $ato->arquivo =  $url;
        }

        $ato->save();

        return redirect()->route('atos')->withStatus("Registro de Ato #$id alterado com sucesso!");
    }
}
