<x-layout title="Editar Editora">
    <x-edit
            titulo="Editar Editora"
            action="editoras.update"
            :id="$colecao->id"
            :colecao="$colecao->nome"
    >
    </x-edit>
</x-layout><?php
