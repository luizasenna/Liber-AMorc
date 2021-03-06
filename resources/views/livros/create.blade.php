<x-layout title="Criar Novo Livro">
    <div class="row col-md-8 justify-content-center">
    <h3>Adicionar novo Livro</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form method="post" action="{{ route('livros.store') }}">
        @csrf
        <div class="form-group mt-3">
            <label>Titulo do Livro:</label>
            <input class="form-control" name="nome" type="text" required/>
        </div>
        <div class="form-group mt-2">
            <label>Autor (a): </label>
            <select class="form-control mt-2" name="autor_id" required>
                <option>Selecione</option>
                @foreach($autores as $autor)
                <option value={{$autor->id}}>{{$autor->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label>Tipo de Livro: </label>
            <select class="form-control mt-2" name="tipo" required>
                <option disabled selected value>Selecione</option>
                @foreach($tipos as $tipo)
                    <option value={{$tipo}}>{{$tipo}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label>Nome da Editora: </label>
            <select class="form-control mt-2" name="editora_id" required>
                <option disabled selected value>Selecione</option>
                @foreach($editoras as $editora)
                <option value={{$editora->id}}>{{$editora->nome}}</option>
               @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label>Descrição <small>(Opcional):</small></label>
            <textarea class="form-control mt-2" name="descricao" type="text" rows="3"
            ></textarea>
        </div>
        <div class="form-group mt-2">
            <label>Código de Barras:</label>
            <input class="form-control mt-2" name="codigobarras" />
        </div>
        <div class="form-group mt-2">
            <label>ISBN:</label>
            <input class="form-control mt-2" name="isbn"/>
        </div>
        <div class="form-group mt-2">
            <label>Edição:</label>
            <input class="form-control mt-2" name="edicao"/>
        </div>

        <div class="form-group mt-2">
            <label>Ano:</label>
            <input class="form-control mt-2" name="ano"/>
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-dark"> Adicionar</button>
        </div>


    </form>
    </div>
</x-layout>