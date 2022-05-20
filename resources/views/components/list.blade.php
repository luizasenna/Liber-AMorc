<div class="col-md-9 justify-content-center">

    <span class="d-flex justify-content-between">
         <h3>{{ $nome }}</h3>
         <a class=" btn btn-dark" href="{{ route($adicionar) }}">Adicionar Novo</a>
    </span>
    <table class="mt-4 table">
        <th class="col-md-9 bg-dark text-white">Nome</th>
        <th class="col-md-3 bg-dark text-white">Ações</th>
        <tr>
            <td>Livro</td>
            <td>
                <span class="d-flex">
                    <a class="btn btn-dark" href="{{route($editar,'1')}}">Editar</a>
                    <form action="{{ route($excluir, '1') }}">
                        <input type="submit" class="ms-2 btn btn-danger" value="Excluir"/>
                    </form>

                </span>
            </td>
        </tr>
    </table>
</div>