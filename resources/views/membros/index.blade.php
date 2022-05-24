<x-layout title="Todos os Membros" :mensagemSucesso="$mensagemSucesso">
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
                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                      Delete
                    </button>
                </span>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Confirmação de delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que deseja excluir este membro?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="{{ route('membros.destroy', $c->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input id="deleteInput" type="submit" class="ms-2 btn btn-danger" value="Excluir"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

        @endforeach

        <script>

            $('#deleteModal').on('shown.bs.modal', function () {
                $('#deleteInput').trigger('focus')
            })
        </script>
    </x-list>
</x-layout>