
<div class="row col-md-8">
    <h3>{{ $nome }}</h3>

    <form method="post" action="{{ route($action) }}">
        @csrf
        <div class="form-group mt-3">
            <label>Nome:</label>
            <input class="form-control" name="nome"/>
        </div>
        @if($action = 'membros.store')
            <div class="form-group mt-3">
                <label>Chave:</label>
                <input class="form-control" name="chave"/>
            </div>
        @endif
        <div class="form-group mt-3">
            <input class="btn btn-dark" type="submit" value="Adicionar"/>
        </div>

    </form>
</div>
