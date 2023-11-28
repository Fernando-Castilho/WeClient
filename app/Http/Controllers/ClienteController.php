<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cadastrar(ClienteRequest $request)
    {
        $cliente = new Cliente();
        $cliente->Nome = $request->nome;
        $cliente->Cpf = $request->cpf;
        $cliente->DataNascimento = $request->dataNascimento;
        $cliente->Renda = $request->renda;
        $cliente->save();
        return redirect()->route("admin.clientes")->with("mensagem", "Cliente cadastrado com sucesso!");
    }

    public function atualizar(ClienteRequest $request, $id)
    {
        Cliente::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("admin.clientes")->with("mensagem", "Cliente atualizado com sucesso!");
    }

    public function excluir($id)
    {
        Cliente::whereId($id)->delete();
        return back()->with("mensagem", "Cliente excluido com sucesso!");
    }
}
