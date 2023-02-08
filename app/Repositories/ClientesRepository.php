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

            $cliente = Clientes::create(
            [
                'foto' => $request->foto,
                'nome' => $request->nome,
                'nome_mae' => $request->nome_mae,
                'data_nascimento' => $request->data_nascimento,
                'cpf' => $request->cpf,
                'cns' => $request->cns
            ]
            );
            
            $cliente_id = $cliente->id;

            $endereco = Enderecos::create(
            [
                'cep' => $request->cep,
                'endereco' => $request->endereco,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
                'cliente_id' => $cliente_id
            ]
            );

			return response()->json(['status' => 'true']);
		} catch (\Exception $e) {
			return response()->json(['error' => $e]);
		}
	}

    public function editarCliente(Request $request)
    {
		try {

			$dataCliente = array();
            $dataEndereco = array();

			if ($request->cep) $dataEndereco['cep'] = $request->cep;
			if ($request->endereco) $dataEndereco['endereco'] = $request->endereco;
            if ($request->numero) $dataEndereco['numero'] = $request->numero;
			if ($request->complemento) $dataEndereco['complemento'] = $request->complemento;
            if ($request->cidade) $dataEndereco['cidade'] = $request->cidade;
			if ($request->bairro) $dataEndereco['bairro'] = $request->bairro;
            if ($request->estado) $dataEndereco['estado'] = $request->estado;
			if ($request->foto) $dataCliente['foto'] = $request->foto;
            if ($request->nome) $dataCliente['nome'] = $request->nome;
			if ($request->nome_mae) $dataCliente['nome_mae'] = $request->nome_mae;
            if ($request->data_nascimento) $dataCliente['data_nascimento'] = $request->data_nascimento;
			if ($request->cpf) $dataCliente['cpf'] = $request->cpf;
            if ($request->cns) $dataCliente['cns'] = $request->cns;
            
			$clienteAtualizacao = Clientes
				::where('id', $request->id)
				->update($dataCliente);

            $enderecoAtualizacao = Enderecos
				::where('cliente_id', $request->id)
				->update($dataEndereco);

			return response()->json(['status' => 'true']);
		} catch (\Exception $e) {
			return response()->json(['error' => $e]);
		}
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
