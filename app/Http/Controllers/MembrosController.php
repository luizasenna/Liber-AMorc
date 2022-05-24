<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use Illuminate\Http\Request;

class MembrosController extends Controller
{
    public function index()
    {
        $colecao = Membro::orderBy('nome')->get();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('membros.index', [
            'colecao' => $colecao,
            'mensagemSucesso' => $mensagemSucesso
        ]);
    }

    public function create()
    {
        return view('membros.create');
    }

    public function store(Request $request)
    {
        $new = Membro::create($request->all());

        return to_route('membros.index')->with('mensagem.sucesso', 'Membro adicionado com sucesso');
    }

    public function edit(Membro $membro)
    {
        return view('membros.edit')->with('colecao', $membro);
    }

    public function update(Membro $membro, Request $request)
    {
        $membro->fill($request->all());
        $membro->save();

        return to_route('membros.index')->with('mensagem.sucesso', 'Membro editado com sucesso.');
    }

    public function destroy(Membro $membro)
    {
        $membro->delete();

        return to_route('membros.index')->with('mensagem.sucesso', 'Membro apagado com sucesso');
    }
}


