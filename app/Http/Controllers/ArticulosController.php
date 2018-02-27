<?php namespace App\Http\Controllers;
use App\Articulo;
Use Illuminate\Http\Request;

class ArticulosController extends Controller {

    public function index() {
        $articulos = Articulo::all();
        return  $this->createSuccessResponse($articulos, 200);
    }

    public function store(Request $request) {
        $this->validateRequest($request);
        // $request->all() obtiene todos los campos que vienen en la request.
        // Si en el request viene algun campo que no es parte de la definicion del model
        // no sera incluido en el alta.
        $articulo = Articulo::create($request->all());
        return  $this->createSuccessResponse($articulo->id, 201);
    }

    public function show($id) {
        $articulo = Articulo::find($id);
        if ($articulo) {
            return  $this->createSuccessResponse($articulo, 200);
        }
        return $this->createErrorResponse("El articulo con id {$id} no existe", 404);
    }

    public function update(Request $request, $id) {
      $articulo = Articulo::find($id);
      if ($articulo) {
          $this->validateRequest($request);
          $articulo->descripcion = $request->get('descripcion');
          $articulo->precio = $request->get('precio');
          $articulo->id_rubro = $request->get('id_rubro');

          $articulo->save();
          return  $this->createSuccessResponse($articulo, 200);
      }
      return $this->createErrorResponse("El articulo con id {$id} no existe", 404);
    }

    public function destroy($id) {
      $articulo = Articulo::find($id);
      if ($articulo) {
          $articulo->delete();
          return  $this->createSuccessResponse($id, 200);
      }
      return $this->createErrorResponse("El articulo con id {$id} no existe", 404);
    }

    function validateRequest($request) {
        $rules = [
            'descripcion' => 'required',
            'precio' => 'required',
            'id_rubro' => 'required',
        ];
        $this->validate($request, $rules);
    }
}
