<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
{
    //
    protected $table = 'tesis';
    protected $primaryKey = 'id_tesis';
    protected $fillable = [
        'titulo',
        'id_estudiante',
        'id_tutor_docente',
        'descripcion',
        'ambito',
        'grupal',
        'estado',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Usuario::class, 'id_estudiante', 'id_usuario');
    }

    public function tutor()
    {
        return $this->belongsTo(Usuario::class, 'id_tutor_docente', 'id_usuario');
    }

}
