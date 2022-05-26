<x-layout title="Editar Membro">
    <x-edit
            titulo="Editar Membro"
            action="membros.update"
            :id="$colecao->id"
            :colecao="$colecao->nome"
            :chave="$colecao->chave"
            :email="$colecao->email"
    >
    </x-edit>
</x-layout><?php
