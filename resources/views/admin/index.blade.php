@extends("layouts.admin")

@section("conteudo")
    {{ $clientes->count() }} Cliente(s) cadastrados
    <br>
    <br>
    Maiores de idade e renda média:
    {{ $clientes->where("Idade", ">", 17)->where("Renda", ">", $rendaMedia)->count(); }}
    <br>
    <br>
    Clientes classe A: {{ $clientes->whereNotNull("Renda")->where("Renda", "<=", 980)->count() }}
    <br>
    Clientes classe B: {{ $clientes->whereNotNull("Renda")->where("Renda", ">", 980)->where("Renda", "<=", 2500)->count() }}
    <br>
    Clientes classe C: {{ $clientes->whereNotNull("Renda")->where("Renda", ">", 2500)->count() }}
    <br>
    Clientes sem classe: {{ $clientes->whereNull("Renda")->count() }}
    <br>
    <br>
    <div id="dia">
        <h1>Hoje</h1>
        <br>
        Clientes cadastrados: {{ $clientesDia->count() }}
        <br>
        <br>
        Clientes classe A: {{ $clientesDia->whereNotNull("Renda")->where("Renda", "<=", 980)->count() }}
        <br>
        Clientes classe B: {{ $clientesDia->whereNotNull("Renda")->where("Renda", ">", 980)->where("Renda", "<=", 2500)->count() }}
        <br>
        Clientes classe C: {{ $clientesDia->whereNotNull("Renda")->where("Renda", ">", 2500)->count() }}
        <br>
        Clientes sem classe: {{ $clientesDia->whereNull("Renda")->count() }}
    </div>
    <br>
    <div id="semana">
        <h1>Essa semana</h1>
        <br>
        Clientes cadastrados: {{ $clientesSemana->count() }}
        <br>
        <br>
        Clientes classe A: {{ $clientesSemana->whereNotNull("Renda")->where("Renda", "<=", 980)->count() }}
        <br>
        Clientes classe B: {{ $clientesSemana->whereNotNull("Renda")->where("Renda", ">", 980)->where("Renda", "<=", 2500)->count() }}
        <br>
        Clientes classe C: {{ $clientesSemana->whereNotNull("Renda")->where("Renda", ">", 2500)->count() }}
        <br>
        Clientes sem classe: {{ $clientesSemana->whereNull("Renda")->count() }}
    </div>
    <br>
    <div id="mes">
        <h1>Esse mês</h1>
        <br>
        Clientes cadastrados: {{ $clientesMes->count() }}
        <br>
        <br>
        Clientes classe A: {{ $clientesMes->whereNotNull("Renda")->where("Renda", "<=", 980)->count() }}
        <br>
        Clientes classe B: {{ $clientesMes->whereNotNull("Renda")->where("Renda", ">", 980)->where("Renda", "<=", 2500)->count() }}
        <br>
        Clientes classe C: {{ $clientesMes->whereNotNull("Renda")->where("Renda", ">", 2500)->count() }}
        <br>
        Clientes sem classe: {{ $clientesMes->whereNull("Renda")->count() }}
    </div>
@endsection