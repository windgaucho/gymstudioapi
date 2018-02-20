<?php namespace App\Http\Controllers;
use App\Cliente;

class ClientesController extends Controller {

    public function index() {
        $clientes = Cliente::all();
        return  $this->createSuccessResponse($clientes, 200);
    }

    public function store() {
        return __METHOD__;
    }

    public function show($id) {
        $cliente = Cliente::find($id);
        if ($cliente) {
            return  $this->createSuccessResponse($cliente, 200);
        }
        return $this->createErrorResponse("El cliente con id {$id} no existe", 404);
    }

    public function update() {
        return __METHOD__;
    }

    public function destroy() {
        return __METHOD__;
    }
}