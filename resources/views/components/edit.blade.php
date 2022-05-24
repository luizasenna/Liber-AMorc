<h3>{{ $titulo }}</h3>
<form method="post" action="{{ route($action, $id) }}">
    @csrf
    @method('PUT')

    <div class="form-group mt-3">
        <label>Nome:</label>
        <input class="form-control" name="nome" value="{{$colecao}}"/>
    </div>
    @if($action == 'membros.update')
        <div class="form-group mt-3">
            <label>Chave:</label>
            <input class="form-control" name="chave" value="{{$chave}}"/>
        </div>
    @endif
    <div class="form-group mt-3">
        <input class="btn btn-dark" type="submit" value="Editar"/>
    </div>

</form>