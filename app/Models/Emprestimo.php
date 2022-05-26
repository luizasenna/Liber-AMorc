<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'livro_id',
        'membro_id',
        'user_id',
        'dataemprestimo',
        'datadevolucao',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function membro()
    {
        return $this->belongsTo(Membro::class, 'membro_id');
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }
}
