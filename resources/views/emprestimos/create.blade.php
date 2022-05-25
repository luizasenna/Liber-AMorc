<x-layout title="Fazer novo Empréstimo">

    <div class="col-md-8 justify-content-center">
        <form method="post" action="{{ route('emprestimos.store') }}">
            @csrf
            <h3>Adicionar Empréstimo de Livro</h3>
            <div class="form-group">
                <label class="mt-2">Livro a ser retirado:</label>
                <select name="livro_id" id="livro" class="form-control mt-2" required>
                    <option disabled selected value>Selecione</option>
                    @foreach($livros as $livro)
                        <option value="{{$livro->id}}">{{ $livro->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label class="mt-2">Membro a retirar o livro:</label>
                <select name="membro_id" id="membro_id" class="form-control mt-2" required>
                    <option disabled selected value>Selecione</option>
                    @foreach($membros as $membro)
                        <option value="{{$membro->id}}">{{ $membro->nome }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group mt-2">
                <label class="mt-2">Data do Empréstimo</label>
                <input required type="date" class="form-control mt-2" name="dataemprestimo" id="dataemprestimo">
            </div>
            <div class="form-group mt-2">
                <label class="mt-2">Usuário(a) responsável</label>
                <input type="text" class="form-control mt-2" name="usuario" id="usuario" disabled value="{{$usuario->name}}">
            </div>
            <input type="hidden" name="user_id" value="{{$usuario->id}}"/>
            <div class="form-group mt-2">
                <input type="submit" class="btn btn-dark" value="Emprestar"/>
            </div>
        </form>


    </div>
    <script>
        $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#dataemprestimo').attr('max', maxDate);
        });
    </script>
</x-layout>