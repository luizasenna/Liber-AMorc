<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Editora;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    public function index()
    {
        $colecao = Livro::with('editora')->with('autor')->orderBy('nome')->get();
        return view('livros.index')->with('colecao', $colecao);
    }

    public function create()
    {
        $autores = Autor::orderBy('nome')->get();
        $editoras = Editora::orderBy('nome')->get();
        return view('livros.create',[
            'autores' => $autores,
            'editoras' => $editoras
        ]);
    }

    public function store(Request $request)
    {
        //dd($request);
        $livro = Livro::create($request->all());;

        return to_route('livros.index')->with('mensagem.sucesso', 'Livro adicionado com sucesso');
    }
}
