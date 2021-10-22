<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ata;

class AtasController extends Controller
{
    public function index(Request $request)
    {

        $paginator = Ata::paginate(30);
        // dd($paginator );
        return view('atas.index', ['paginator'=>$paginator]);
    }
    
    public function create(Request $request)
    {
        return view('atas.form', []);
    }
    
    public function edit(Request $request, $id)
    {
        $ata = Ata::find($id);
        return view('atas.form', ['ata'=>$ata,]);
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

        Ata::create([
            'titulo'=>$request->titulo,
            'descricao'=>$request->descricao,
            'arquivo'=>$url,
        ]);

        return redirect()->route('atas')->withStatus('Registro de atas criado com sucesso!');
    }
    
    public function update(Request $request, $id)
    {

        $ata = Ata::find($id);
        if($request->hasFile('titulo')) $ata->titulo = $request->titulo;
        if($request->hasFile('descricao')) $ata->descricao = $request->descricao;

         if ($request->hasFile('arquivo')) {
            $extension = $request->arquivo->extension();
            $filename = $ata->titulo."-".time().".".$extension;
            $request->arquivo->storeAs('/public',  $filename);
            $url = \Storage::url( $filename);
            $ata->arquivo =  $url;
        }

        $ata->save();

        return redirect()->route('atas')->withStatus("Registro de Ata #$id alterado com sucesso!");
    }
}
