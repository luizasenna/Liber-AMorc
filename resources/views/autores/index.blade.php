<x-layout title="Todos os Autores">
    <x-list
            nome="Todos os Autores"
            adicionar="autores.create"
    >

        @foreach($colecao as $c)
            <tr>

                <td>{{$c->id}}</td>
                <td>{{$c->nome}}</td>
                <td>
                <span class="d-flex">
                    <a class="btn btn-dark" href="{{route('livros.edit',$c->id)}}">Editar</a>
                    <form action="{{ route('livros.destroy', $c->id) }}">
                        <input type="submit" class="ms-2 btn btn-danger" value="Excluir"/>
                    </form>

                </span>
                </td>
            </tr>
        @endforeach
    </x-list>
</x-layout>