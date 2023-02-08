<?php

namespace App\Repositories;

use App\Models\Clientes;
use App\Models\Enderecos;

class ClientesRepository{

	public function __construct()
    {
    }

    public function listarClientes()
    {
        $clientes = Clientes::with('endereco')->get();
        return $clientes;
    }

    public function listarClientesById($id)
    {
        $clientes = Clientes::with('endereco')
        ->where('id', $id)
        ->get();
        return $clientes;
    }

    public function deletarCliente($id)
    {
		try {
			$clientes = Clientes::with('endereco')
                ->where('id', $id)
                ->delete();
			return response()->json(['status' => 'Cliente deletado com sucesso']);
		} catch (\Exception $e) {
			return response()->json(['error' => $e]);
		}
	}

    
}
