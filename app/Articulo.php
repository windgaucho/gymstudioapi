<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model {
    protected $fillable = ['id', 'descripcion', 'precio', 'id_rubro'];

    public function rubro() {
        return $this->belongsTo('App\Rubro');
    }
}