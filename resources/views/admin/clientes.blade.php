@extends("layouts.admin")

@php
    if(!isset($nome)){
        $nome = "";
    }
@endphp

@section("conteudo")
    <div class="novo-cliente">
        <a href="{{ route("admin.cadastroClientes") }}"><button class="btn-novo">Novo</button></a>
    </div>
    <div class="search-bar">
        <form id="searchForm">
            <input type="search" name="search" id="search" value="{{ $nome }}" placeholder="Pesquisar" /><button type="submit" id="buttonPesquisar"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button>
        </form>
    </div>
    <br>
    @if($clientes->hasPages())
        <div class="page-indicator">
            <h3>Resultados {{$clientes->firstItem()}} a {{$clientes->lastItem()}} de {{$clientes->total()}}</h3>
            @if($clientes->previousPageUrl())
                <a href="{{ $clientes->previousPageUrl() }}">Anterior</a>
            @else
                <a>Anterior</a>
            @endif
            {{ $clientes->currentPage() }} / {{ $clientes->lastPage() }}
            @if($clientes->nextPageUrl())
                <a href="{{ $clientes->nextPageUrl() }}">Próxima</a>
            @else
                <a>Próxima</a>
            @endif
        </div>
    @endif
    @if($clientes->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Renda familiar</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td class="nome">{{ $cliente->Nome }}</td>
                        <td class="renda">
                            @if($cliente->Renda)
                                @if($cliente->Renda <= 980)
                                    <div class="badge bg-vermelho">R$ {{ intval($cliente->Renda) }}</div>
                                @elseif($cliente->Renda > 980 && $cliente->Renda <= 2500)
                                    <div class="badge bg-amarelo">R$ {{ intval($cliente->Renda) }}</div>
                                @elseif($cliente->Renda > 2500)
                                    <div class="badge bg-verde">R$ {{ intval($cliente->Renda) }}</div>
                                @endif
                            @else
                                <div class="badge bg-cinza">Não declarada</div>
                            @endif
                        </td>
                        <td class="acoes">
                            <a href="{{ route("admin.clienteId", ["id" => $cliente->Id]) }}"><button class="btn btn-azul">Editar</button></a>
                            &nbsp;
                            <form action="{{ route("cliente.excluir", ["id" => $cliente->Id]) }}" method="post">
                                @csrf
                                @method("delete")
                                <button type="submit" class="btn btn-vermelho">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert">
            <span class="alert-danger">Clientes não encontrados!</span>
        </div>
    @endif
    <script src="/js/search.js"></script>
@endsection