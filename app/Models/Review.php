<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    protected $fillable = ['id', 'livro_id', 'usuario_id', 'nota', 'comentario'];

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
}
