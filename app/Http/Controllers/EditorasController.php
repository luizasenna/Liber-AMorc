<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditorasController extends Controller
{
    public function index()
    {
        $colecao = Editora::orderBy('nome')->get();
        //dd($colecao);
        return view('editoras.index', [
            'colecao' => $colecao
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


        return to_route('editoras.index',[
            'mensagem.sucesso' => 'Editora adicionada com sucesso'
        ]);
    }
}
