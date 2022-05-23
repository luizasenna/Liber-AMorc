<x-layout title="Todos os Membros">
    <x-list
            nome="Todos os Membros"
            adicionar="membros.create"
    >

        @foreach($colecao as $c)
            <tr>

                <td>{{$c->id}}</td>
                <td>{{$c->nome}}</td>
                <td>{{$c->chave}}</td>
                <td>
                <span class="d-flex">
                    <a class="btn btn-dark" href="{{route('membros.edit',$c->id)}}">Editar</a>
                    <form action="{{ route('membros.destroy', $c->id) }}">
                        <input type="submit" class="ms-2 btn btn-danger" value="Excluir"/>
                    </form>

                </span>
                </td>
            </tr>
        @endforeach
    </x-list>
</x-layout>