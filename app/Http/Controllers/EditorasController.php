<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditorasController extends Controller
{
    public function index()
    {
        $colecao = Editora::orderBy('status')->orderBy('nome')->get();
        $mensagemSucesso = session('mensagem.sucesso');
        //dd($colecao);
        return view('editoras.index', [
            'colecao' => $colecao,
            'mensagemSucesso' => $mensagemSucesso
        ]);
    }

    public function create()
    {
        return view('editoras.create');
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $col = $request->all();
        $new = Editora::create($col);


        return to_route('editoras.index')->with('mensagem.sucesso' , 'Editora adicionada com sucesso');
    }

    public function edit(Editora $editora)
    {
        //dd($editora);
        return view('editoras.edit')->with('colecao', $editora);
    }

    public function update(Editora $editora, Request $request)
    {
        $editora->fill($request->all());
        $editora->save();
        return to_route('editoras.index')->with('mensagem.sucesso', 'Editora Atualizada com sucesso.');
    }

    public function destroy(Editora $editora)
    {
        $editora->delete();

        return to_route('editoras.index')->with('mensagem.sucesso', 'Editora deletada com sucesso.');
    }
}
