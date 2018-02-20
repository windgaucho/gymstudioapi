<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rubro extends Model {
    use SoftDeletes;

    protected $fillable = ['id', 'descripcion', 'tipo', 'grupo', 'deleted_at'];

    public function articulos() {
        return $this->hasMany('App\Articulo', 'id_rubro');
    }
}