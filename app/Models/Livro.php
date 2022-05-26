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
         'ano',
         'status'
     ];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
     }

    public function editora()
    {
        return $this->belongsTo(Editora::class, 'editora_id');
     }

    public function emprestimo()
    {
        return $this->hasMany(Emprestimo::class, 'id', 'livro_id');
     }

}
