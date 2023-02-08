<?php

namespace App\Repositories;

use App\Models\Clientes;
use App\Models\Enderecos;
use Illuminate\Http\Request;

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

    public function cadastrarCliente(Request $request)
    {
		try {

            $endereco = Enderecos::create(
            [
                'cep' => $request->cep,
                'endereco' => $request->endereco,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'estado' => $request->estado
            ]
            );

            $endereco_id = $endereco->id;

			$clientes = Clientes::create(
            [
                'foto' => $request->foto,
                'nome' => $request->nome,
                'nome_mae' => $request->nome_mae,
                'data_nascimento' => $request->data_nascimento,
                'cpf' => $request->cpf,
                'cns' => $request->cns,
                'endereco_id' => $endereco_id
            ]
			);

			return response()->json(['status' => 'true']);
		} catch (\Exception $e) {
			return response()->json(['error' => $e]);
		}
	}

    public function editarClientes()
    {
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
