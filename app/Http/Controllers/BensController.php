<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bem;
use App\Http\Controllers\Storage;

class BensController extends Controller
{
    public function index(Request $request)
    {

        $paginator = Bem::paginate(30);
        // dd($paginator );
        return view('bens.index', ['paginator'=>$paginator]);
    }
    
    public function create(Request $request)
    {
        return view('bens.form', []);
    }
    
    public function edit(Request $request, $id)
    {
        $bem = Bem::find($id);
        return view('bens.form', ['bem'=>$bem,]);
    }
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'descricao' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);
        // dd($request->foto);
        $url = '';
        
        if ($request->hasFile('foto')) {
            $extension = $request->foto->extension();
             $filename = $validated['descricao']."-".time().".".$extension;
            $request->foto->storeAs('/public', $filename);
            $url = \Storage::url($filename);
        }

        Bem::create([
            'descricao'=>$request->descricao,
            'foto'=>$url,
        ]);

        return redirect()->route('bens')->withStatus('Registro de bens criado com sucesso!');
    }
    
    public function update(Request $request, $id)
    {

        $bem = Bem::find($id);
        if($request->hasFile('descricao')) $bem->descricao = $request->descricao;

         if ($request->hasFile('foto')) {
            $extension = $request->foto->extension();
            $filename = $bem->descricao."-".time().".".$extension;
            $request->foto->storeAs('/public',  $filename);
            $url = \Storage::url( $filename);
            $bem->foto =  $url;
        }

        $bem->save();

        return redirect()->route('bens')->withStatus("Registro de Bem #$id alterado com sucesso!");
    }
}
