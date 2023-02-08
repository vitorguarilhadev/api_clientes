<?php

namespace App\Http\Controllers;

use App\Repositories\ClientesRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    protected $clientesRepository;

    public function __construct(ClientesRepository $clientesRepository)
	{
	    $this->clientesRepository = $clientesRepository;
    }

    public function listarClientes()
    {
        return $this->clientesRepository->listarClientes();
    }

    public function listarClientesById($id)
    {
        return $this->clientesRepository->listarClientesById($id);
    }

    public function cadastrarCliente(Request $request)
    {
        return $this->clientesRepository->cadastrarCliente($request);
    }

    public function editarCliente(Request $request)
    {
        return $this->clientesRepository->editarCliente($request);
    }

    public function deletarCliente($id)
    {
        return $this->clientesRepository->deletarCliente($id);
    }


}
