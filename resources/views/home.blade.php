<x-layout title="Home">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header card-dark bg-dark text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Empréstimos de Livros Pendentes</h3>
                    <table class="table">
                        <th class="col-md-5">Titulo</th>
                        <th class="col-md-4">Membro</th>
                        <th class="col-md-2">Data</th>
                        <th class="col-md-1">Ação</th>
                        @foreach($emprestimos as $emprestimo)
                            <tr>
                                <td>{{ $emprestimo->livro->nome }}</td>
                                <td>{{ $emprestimo->membro->nome }}</td>
                                <td>{{date('d/m/Y', strtotime($emprestimo->dataemprestimo)) }}</td>
                                <td>
                                    <form method="post" action="{{ route('emprestimos.edit', $emprestimo->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="submit" value="Devolver" class="btn btn-danger"/>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>
