<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutoresController extends Controller
{
    public function index()
    {
        $colecao = Autor::orderBy('nome')->get();
        //dd($colecao);
        return view('autores.index', [
            'colecao' => $colecao
        ]);
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $new =  Autor::create($request->all());

        return to_route('autores.index')->with('mensagem.sucesso', 'Autor adicionado com sucesso.');
    }

    public function edit(Autor $autore)
    {

        return view('autores.edit')->with('colecao', $autore);
    }

    public function update(Autor $autore, Request $request)
    {
        $autore->fill($request->all());
        $autore->save();

        return to_route('autores.index')->with('mensagem.sucesso', 'Autor atualizado com sucesso');

    }

    public function destroy(Autor $autore)
    {
        $autore->delete();

        return to_route('autores.index')->with('mensagem.sucesso', 'Autor deletado com sucesso.');
    }
}
