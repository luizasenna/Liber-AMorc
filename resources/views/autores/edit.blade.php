<x-layout title="Editar Autor">


    <x-edit

            titulo="Editar Autor"
            action="autores.update"
            :id="$colecao->id"

            :colecao="$colecao->nome"

    >
    </x-edit>
</x-layout><?php
