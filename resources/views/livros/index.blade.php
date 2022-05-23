
    <x-layout title="Todos os Livros" >
        <x-list
                nome="Todos os Livros"
                editar="livros.edit"
                excluir="livros.destroy"
                adicionar="livros.create">

            @foreach($colecao as $c)
                <tr>

                    <td>{{$c->id}}</td>
                    <td>{{$c->nome}}</td>
                    <td>{{$c->autor->nome}}</td>
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
