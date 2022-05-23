<div class="col-md-9 justify-content-center">

    <span class="d-flex justify-content-between">
         <h3>{{ $nome }}</h3>
         <a class=" btn btn-dark" href="{{ route($adicionar) }}">Adicionar Novo</a>
    </span>
    <table class="mt-4 table">

        <th class="col-md-1 bg-dark text-white">Cod</th>
        @if($adicionar == 'livros.create')
            <th class="col-md-6 bg-dark text-white">Nome</th>
            <th class="col-md-3 bg-dark text-white">Autor(a)</th>
            @elseif($adicionar == 'membros.create')
                <th class="col-md-6 bg-dark text-white">Nome</th>
                <th class="col-md-3 bg-dark text-white">Chave</th>
        @else
            <th class="col-md-6 bg-dark text-white">Nome</th>
        @endif

        <th class="col-md-2 bg-dark text-white">Ações</th>

    {{ $slot }}
    </table>
</div>