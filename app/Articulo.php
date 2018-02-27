<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model {
    use SoftDeletes;

    protected $fillable = ['id', 'descripcion', 'precio', 'id_rubro'];

    public function rubro() {
        return $this->belongsTo('App\Rubro');
    }
}
