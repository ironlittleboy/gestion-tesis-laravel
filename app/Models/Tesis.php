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
        'id_estudiante_companero',
        'descripcion',
        'ambito',
        'grupal',
        'estado',
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'id_tesis', 'id_tesis');
    }

    public function calificacion()
    {
        return $this->hasOne(Calificaion_tesis::class, 'id_tesis', 'id_tesis');
    }
    
    public function estudiante()
    {
        return $this->belongsTo(Usuario::class, 'id_estudiante', 'id_usuario');
    }

    public function estudianteCompanero()
    {
        return $this->belongsTo(Usuario::class, 'id_estudiante_companero', 'id_usuario');
    }

    public function tutor()
    {
        return $this->belongsTo(Usuario::class, 'id_tutor_docente', 'id_usuario');
    }

}
