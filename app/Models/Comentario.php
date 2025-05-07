<?php

// app/Models/Comentario.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios'; // si no se llama "comentarios" tu tabla, cambia esto

    protected $fillable = [
        'user_id',
        'categoria',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
