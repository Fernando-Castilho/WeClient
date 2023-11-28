<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $clientes = Cliente::all();
        foreach($clientes as $cliente){
            $cliente->Idade = Carbon::parse($cliente->DataNascimento)->age;
        }
        $rendaMedia = Cliente::avg("Renda");
        $clientesMes = Cliente::whereMonth("DataCadastro", Carbon::today())->get();
        $clientesSemana = Cliente::whereDate("DataCadastro", ">=", Carbon::now()->startOfWeek())->get();
        $clientesDia = Cliente::whereDay("DataCadastro", Carbon::today())->get();
        return view("admin.index", [
            "clientes" => $clientes, 
            "rendaMedia" => $rendaMedia,
            "clientesDia" => $clientesDia,
            "clientesSemana" => $clientesSemana,
            "clientesMes" => $clientesMes
        ]);
    }

    public function clientes()
    {
        $clientes = Cliente::paginate(10);
        return view("admin.clientes", ["clientes" => $clientes]);
    }

    public function cadastroClientes()
    {
        return view("admin.cadastroClientes");
    }

    public function clienteId($id)
    {
        $id = intval($id);
        if($id <= 0){
            return redirect()->route("admin.clientes");
        }
        $cliente = Cliente::find($id);
        return view("admin.cadastroClientes", ["cliente" => $cliente]);
    }

    public function pesquisarClientes($nome)
    {
        $clientes = Cliente::where("Nome", "LIKE", "%".$nome."%")->paginate(10);
        return view("admin.clientes", ["clientes" => $clientes, "nome" => $nome]);
    }
}
