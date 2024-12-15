<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{
    //
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'nombres_usuario',
        'email',
        'password',
        'id_rol',
        'telefono_usuario',
        'direccion_usuario'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    public function username()
    {
        return 'email';
    }
    
    // Métodos requeridos por JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Roles::class, 'id_rol', 'id_rol');
    }

    public function tesis()
    {
        return $this->hasMany(Tesis::class, 'id_estudiante', 'id_usuario');
    }

    public function tesisTutor()
    {
        return $this->hasOne(Tesis::class, 'id_tutor_docente', 'id_usuario');
    }

    public function estudiantesCompanero()
    {
        return $this->hasOne(Tesis::class, 'id_estudiante_companero', 'id_usuario');
    }
    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'id_usuario', 'id_usuario');
    }
}
