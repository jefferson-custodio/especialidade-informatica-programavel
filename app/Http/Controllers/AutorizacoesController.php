<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autorizacao;
use App\Models\Desbravador;

class AutorizacoesController extends Controller
{
        public function index(Request $request)
    {

        $paginator = Autorizacao::with('desbravador')->paginate(30);
        // dd($paginator );
        return view('autorizacoes.index', ['paginator'=>$paginator]);
    }
    
    public function create(Request $request)
    {
        $desbravadores = Desbravador::get();
        return view('autorizacoes.form', ['desbravadores'=>$desbravadores]);
    }
    
    public function edit(Request $request, $id)
    {
        $desbravadores = Desbravador::get();
        $autorizacao = Autorizacao::find($id);
        return view('autorizacoes.form', ['autorizacao'=>$autorizacao,'desbravadores'=>$desbravadores]);
    }
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'desbravador_id' => 'required',
            'arquivo' => 'required|mimes:pdf,docx|max:2048',
        ]);
        // dd($request->arquivo);
        $url = '';
        
        if ($request->hasFile('arquivo')) {
            $extension = $request->arquivo->extension();
             $filename = time().".".$extension;
            $request->arquivo->storeAs('/public', $filename);
            $url = \Storage::url($filename);
        }

        Autorizacao::create([
            'desbravador_id'=>$request->desbravador_id,
            'arquivo'=>$url,
        ]);

        return redirect()->route('autorizacoes')->withStatus('Registro de autorizacoes criado com sucesso!');
    }
    
    public function update(Request $request, $id)
    {

        $autorizacao = Autorizacao::find($id);
        if($request->has('desbravador_id')) $autorizacao->desbravador_id = $request->desbravador_id;

         if ($request->hasFile('arquivo')) {
            $extension = $request->arquivo->extension();
            $filename = time().".".$extension;
            $request->arquivo->storeAs('/public',  $filename);
            $url = \Storage::url( $filename);
            $autorizacao->arquivo =  $url;
        }

        $autorizacao->save();

        return redirect()->route('autorizacoes')->withStatus("Registro de Autorizacao #$id alterado com sucesso!");
    }
}
