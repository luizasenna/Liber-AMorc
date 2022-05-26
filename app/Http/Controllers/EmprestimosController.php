<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Membro;
use DateTime;
use Illuminate\Http\Request;

class EmprestimosController extends Controller
{
    public function index()
    {
        $emprestimos = Emprestimo::orderBy('status')->get();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('emprestimos.index',[
            'emprestimos' => $emprestimos,
            'mensagemSucesso' => $mensagemSucesso
        ]);
    }

    public function create()
    {
        //$livros = Livro::orderBy('nome')->get();
        $livros = Livro::leftJoin('emprestimos', 'livros.id', '=' ,'emprestimos.livro_id')
           ->where(function($query){
               $query->whereNull('dataemprestimo')
                   ->orWhereNotNull('datadevolucao');
           })->groupBy('livros.id')->orderBy('status')->get(array('livros.*'));
        $membros = Membro::orderBy('nome')->get();
        $usuario = auth()->user();

        return view('emprestimos.create', [
            'livros' => $livros,
            'membros' => $membros,
            'usuario' => $usuario
        ]);

    }

    public function store(Request $request)
    {
        $data = DateTime::createFromFormat('Y-m-d', $request->dataemprestimo);
        $request->dataemprestimo = $data->getTimestamp();
        $new = Emprestimo::create($request->all());

        return to_route('emprestimos.index')->with('mensagem.sucesso', 'Emprestimo realizado com sucesso.');
    }

    public function edit(Emprestimo $emprestimo)
    {
      return view('emprestimos.edit')->with('emprestimo', $emprestimo);
    }

    public function update(Request $request, Emprestimo $emprestimo)
    {
        $data = DateTime::createFromFormat('Y-m-d', $request->datadevolucao);
        $request->datadevolucao = $data->getTimestamp();
        $emprestimo->fill($request->all());
        $emprestimo->save();

        return to_route('emprestimos.index')->with('mensagem.sucesso', 'Devolução realizada com sucesso.');
    }
}

