<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use Illuminate\Http\Request;

class MembrosController extends Controller
{
    public function index()
    {
        $colecao = Membro::orderBy('nome')->get();
        return view('membros.index')->with('colecao', $colecao);
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

}


