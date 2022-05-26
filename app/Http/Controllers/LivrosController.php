<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivrosRequest;
use App\Models\Autor;
use App\Models\Editora;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller
{

    const tipos = ['Brochura', 'Revista', 'Capa Dura', 'Espiral', 'Grampeado'];

    public function index()
    {
        $mensagemSucesso = session('mensagem.sucesso');
        $colecao = Livro::with('editora')->with('autor')->orderBy('livros.status')->orderBy('nome')->get();
        return view('livros.index', [
            'mensagemSucesso' => $mensagemSucesso
        ])->with('colecao', $colecao);
    }

    public function create()
    {
        $autores = Autor::orderBy('nome')->get();
        $editoras = Editora::orderBy('nome')->get();
        return view('livros.create',[
            'autores' => $autores,
            'editoras' => $editoras,
            'tipos' => self::tipos,
        ]);
    }

    public function store(LivrosRequest $request)
    {
        //dd($request);
        $livro = Livro::create($request->all());;

        return to_route('livros.index')->with('mensagem.sucesso', 'Livro adicionado com sucesso');
    }

    public function edit(Livro $livro)
    {
        $autores = Autor::orderBy('nome')->get();
        $editoras = Editora::orderBy('nome')->get();
        return view('livros.edit',[
            'autores' => $autores,
            'editoras' => $editoras,
            'tipos' => self::tipos,
            'livro' => $livro
        ]);
    }

    public function update(Livro $livro, LivrosRequest $request)
    {
        $livro->fill($request->all());
        $livro->save();

        return to_route('livros.index')->with('mensagem.sucesso', 'Livro Editado com sucesso');

    }

    public function destroy(Livro $livro)
    {
        $livro->delete();

        return to_route('livros.index')->with('mensagem.sucesso', 'Livro deletado com sucesso');
    }
}
