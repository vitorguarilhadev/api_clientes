<?php

namespace App\Http\Controllers;

use App\Repositories\ClientesRepository;
use App\Http\Controllers\Controller;

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

    public function deletarCliente($id)
    {
        return $this->clientesRepository->deletarCliente($id);
    }


}
