<x-layout title="Todas as Editoras" :mensagemSucesso="$mensagemSucesso">
    <x-list
            nome="Todas as Editoras"
            adicionar="editoras.create"

    >

        @foreach($colecao as $c)
            <tr>

                <td>{{$c->id}}</td>
                <td>{{$c->nome}}</td>
                <td>
                <span class="d-flex">
                    <a class="btn btn-dark" href="{{route('editoras.edit',$c->id)}}">Editar</a>
                    <form action="{{ route('editoras.update', $c->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        @if($c->status == '0')
                            <input type="hidden" name="status" value="1"/>
                            <input type="submit" class="ms-2 btn btn-danger" value="Inativar"/>
                        @else
                            <input type="hidden" name="status" value="0"/>
                            <input type="submit" class="ms-2 btn btn-warning" value="Reativar"/>
                        @endif
                    </form>

                </span>
                </td>
            </tr>
        @endforeach
    </x-list>
</x-layout>