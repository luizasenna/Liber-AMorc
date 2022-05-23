<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

     protected $fillable = [
         'nome',
         'autor_id',
         'tipo',
         'descricao',
         'codigobarras',
         'isbn',
         'edicao',
         'editora_id',
         'ano'
     ];

    public function autor()
    {
        return $this->hasOne(Autor::class, "id");
     }

    public function editora()
    {
        return $this->hasOne(Editora::class, 'id');
     }

}
