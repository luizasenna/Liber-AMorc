<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    public function index()
    {
        return view('livros.index');
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        $livro = Livro::create($request->all());;

        return to_route('livros.index')->with('mensagem.sucesso', 'Livro adicionado com sucesso');
    }
}
