<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    protected $fillable = ['id', 'apellido', 'nombre', 'dni', 'fecha_nacimiento', 'email',
    'telefono', 'direccion', 'id_ciudad', 'observaciones', 'vencimiento', 'saldo', 'enroll_number',
    'ultimo_acceso', 'certificado_medico', 'vencimiento_certificado'];
}