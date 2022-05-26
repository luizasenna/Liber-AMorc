<x-layout title="Devolver Livro">
    <div class="col-md-8 justify-content-center">
        <h3>Devolver Livro</h3>

            <h5 class="mt-4"><b>Nome do Livro:</b> {{ $emprestimo->livro->nome }}</h5>
            <h5 class="mt-2"><b>Membro Rosacruz:</b> {{ $emprestimo->membro->nome }}</h5>
            <h5 class="mt-2"><b>Data de Retirada:</b>
                {{ date('d/m/Y', strtotime($emprestimo->dataemprestimo)) }}</h5>
            <form method="post" action="{{ route('emprestimos.update', $emprestimo->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group mt-4">
                    <label>Data da Devolução: </label>
                    <input type="date" name="datadevolucao" id="datadevolucao" class="form-control mt-2"/>
                    <input type="hidden" name="status" id="status" value="1"/>
                </div>

                <input type="submit" value="Devolver" class="btn btn-dark mt-2" />
            </form>
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
                $('#datadevolucao').attr('max', maxDate);
            });
        </script>
    </div>
</x-layout>