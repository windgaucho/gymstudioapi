<?php namespace App\Http\Controllers;
use App\Articulo;

class ArticulosController extends Controller {

    public function index() {
        $articulos = Articulo::all();
        return  $this->createSuccessResponse($articulos, 200);
    }

    public function store(Request $request) {
        $rules = [
            'descripcion' => 'required',
            'id_rubro'
            'tipo' => 'required|in:INGRESO,EGRESO'
        ];
        $this->validate($request, $rules);
        // $request->all() obtiene todos los campos que vienen en la request.
        // Si en el request viene algun campo que no es parte de la definicion del model
        // no sera incluido en el alta.
        $rubro = Rubro::create($request->all());
        return  $this->createSuccessResponse($rubro->id, 201);
    }

    public function show($id) {
        $articulo = Articulo::find($id);
        if ($articulo) {
            return  $this->createSuccessResponse($articulo, 200);
        }
        return $this->createErrorResponse("El articulo con id {$id} no existe", 404);
    }

    public function update() {
        return __METHOD__;
    }

    public function destroy() {
        return __METHOD__;
    }
}