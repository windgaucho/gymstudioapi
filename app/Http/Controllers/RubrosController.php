<?php namespace App\Http\Controllers;
Use App\Rubro;
Use Illuminate\Http\Request;
use Carbon\Carbon;

class RubrosController extends Controller {

    public function index() {
        // with('articulos') ejecuta el query de la relacion a articulos en forma eager
        $rubros = Rubro::with('articulos')->all();
        return  $this->createSuccessResponse($rubros, 200);
    }

    public function store(Request $request) {
        $this->validateRequest($request);
        // $request->all() obtiene todos los campos que vienen en la request.
        // Si en el request viene algun campo que no es parte de la definicion del model
        // no sera incluido en el alta.
        $rubro = Rubro::create($request->all());
        return  $this->createSuccessResponse($rubro->id, 201);
    }

    public function show($id) {
        $rubro = Rubro::with('articulos')->find($id);
        if ($rubro) {
            return  $this->createSuccessResponse($rubro, 200);
        }
        return $this->createErrorResponse("El rubro con id {$id} no existe", 404);
    }

    public function update(Request $request, $id) {
        $rubro = Rubro::find($id);
        if ($rubro) {
            $this->validateRequest($request);
            $rubro->descripcion = $request->get('descripcion');
            $rubro->tipo = $request->get('tipo');
            $rubro->grupo = $request->get('grupo');
            
            $rubro->save();
            return  $this->createSuccessResponse($rubro, 200);
        }
        return $this->createErrorResponse("El rubro con id {$id} no existe", 404);
    }

    public function destroy($id) {
        $rubro = Rubro::find($id);
        if ($rubro) {
            $articulos = $rubro->articulos;
            if (sizeof($articulos) > 0) {
                // 409 conflicto con la request
                return $this->createErrorResponse("El rubro con id {$id} tiene articulos asociados", 409);
            }
            $rubro->delete();
            return  $this->createSuccessResponse($id, 200);
        }
        return $this->createErrorResponse("El rubro con id {$id} no existe", 404);
    }

    function validateRequest($request) {
        $rules = [
            'descripcion' => 'required',
            'tipo' => 'required|in:INGRESO,EGRESO'
        ];
        $this->validate($request, $rules);
    }
}