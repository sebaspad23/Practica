<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'abreviacion', 'aula', 'descripcion', 'icono', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
