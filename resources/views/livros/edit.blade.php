<x-layout title="Editar Livro">
    <div class="row col-md-8 justify-content-center">
        <h3>Editar Livro</h3>
        <form method="post" action="{{ route('livros.update', $livro->id) }}">
            @csrf
            @method("PUT")
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group mt-3">
                <label>Titulo do Livro:</label>
                <input class="form-control" name="nome" type="text" required value="{{$livro->nome}}"/>
            </div>
            <div class="form-group mt-2">
                <label>Autor (a): </label>
                <select class="form-control mt-2" name="autor_id" required>
                    @foreach($autores as $autor)
                        <option value={{$autor->id}}
                        {{ $livro->autor_id == $autor->id ? 'selected' : '' }}
                        >{{$autor->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label>Tipo de Livro: </label>
                <select class="form-control mt-2" name="tipo" required>
                    @foreach($tipos as $tipo)
                        <option value={{$tipo}}
                          {{ $livro->tipo == $tipo ? 'selected' : '' }}
                        >{{$tipo}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label>Nome da Editora: </label>
                <select class="form-control mt-2" name="editora_id" required>
                    @foreach($editoras as $editora)
                        <option value={{$editora->id}}
                                {{ $livro->editora_id == $editora->id ? 'selected' : '' }}
                        >{{$editora->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label>Descrição <small>(Opcional):</small></label>
                <textarea class="form-control mt-2" name="descricao" type="text" rows="3"
                          >{{$livro->descricao ? $livro->descricao : ''}}</textarea>
            </div>
            <div class="form-group mt-2">
                <label>Código de Barras:</label>
                <input class="form-control mt-2" name="codigobarras" value="{{$livro->codigobarras ? $livro->codigobarras : ''}}"/>
            </div>
            <div class="form-group mt-2">
                <label>ISBN:</label>
                <input class="form-control mt-2" name="isbn" value="{{$livro->isbn ? $livro->isbn : ''}}"/>
            </div>
            <div class="form-group mt-2">
                <label>Edição:</label>
                <input class="form-control mt-2" name="edicao" value="{{$livro->edicao ? $livro->edicao : ''}}"/>
            </div>

            <div class="form-group mt-2">
                <label>Ano:</label>
                <input class="form-control mt-2" name="ano" value="{{$livro->ano ? $livro->ano : ''}}"/>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-dark"> Adicionar</button>
            </div>


        </form>
    </div>
</x-layout>