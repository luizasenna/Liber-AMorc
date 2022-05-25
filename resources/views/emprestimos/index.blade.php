<x-layout title="Todos os empréstimos de livros" :mensagemSucesso="$mensagemSucesso">
    <div class="col-md-11 justify-content-center">

    <span class="d-flex justify-content-between">
         <h3>Empréstimos de Livros</h3>
         <a class=" btn btn-dark" href="{{ route('emprestimos.create') }}">Fazer Novo Empréstimo</a>
    </span>
        <table class="mt-4 table">

                <th class="col-md-1 bg-dark text-white">Data</th>
                <th class="col-md-5 bg-dark text-white">Nome</th>
                <th class="col-md-4 bg-dark text-white">Membro</th>
                <th class="col-md-1 bg-dark text-white">Status</th>
                <th class="col-md-1 bg-dark text-white">Ações</th>
                @foreach($emprestimos as $emprestimo)
                    <tr>
                        <td>{{date('d/m/Y', strtotime($emprestimo->dataemprestimo)) }}</td>
                        <td>{{$emprestimo->livro->nome}}</td>
                        <td>{{$emprestimo->membro->nome}}</td>
                        <td>{{$emprestimo->datadevolucao ? 'Devolvido' : 'Pendente'}}</td>
                        <td>
                            @if(isset($emprestimo->datadevolucao))   Finalizado
                            @else
                            <a class="btn btn-danger" href="{{ route('emprestimos.edit', $emprestimo->id) }}">Devolver</a>
                            @endif
                        </td>
                    </tr>
                @endforeach

        </table>
    </div>
</x-layout>
