@extends("layouts.admin")

@section("conteudo")
    <div class="card">
        <h1 class="title tx-black">Renda média: {{ number_format((float)$rendaMedia, 2, ",", "") }}</h1>
        <div class="mini-card w-90 bg-cinza">
            <h2>Clientes com renda superior: {{ $clientes->where("Idade", ">", 17)->where("Renda", ">", $rendaMedia)->count(); }}</h2>
        </div>
    </div>
    <div class="card">
        <h1 class="title tx-black">Classes - Clientes</h1>
        <div class="flex">
            <div class="mini-card bg-vermelho">
                <h2>Classe A</h2>
                <div class="number">
                    {{ $clientes->whereNotNull("Renda")->where("Renda", "<=", 980)->count() }}
                </div>
            </div>
            <div class="mini-card bg-amarelo">
                <h2>Classe B</h2>
                <div class="number">
                    {{ $clientes->whereNotNull("Renda")->where("Renda", ">", 980)->where("Renda", "<=", 2500)->count() }}
                </div>
            </div>
            <div class="mini-card bg-verde">
                <h2>Classe C</h2>
                <div class="number">
                    {{ $clientes->whereNotNull("Renda")->where("Renda", ">", 2500)->count() }}
                </div>
            </div>
            <div class="mini-card bg-cinza">
                <h2>Não definida</h2>
                <div class="number">
                    {{ $clientes->whereNull("Renda")->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="menu-card">
            <ul class="arredondado">
                <li><a class="active" id="hoje" onclick="TrocarData('hoje')">Hoje</a></li>
                <li><a id="semana" onclick="TrocarData('semana')">Esse semana</a></li>
                <li><a id="mes" onclick="TrocarData('mes')">Esse mês</a></li>
            </ul>
        </div>
        <div id="dadosHoje" class="mini-card bg-cinza2 w-90">
            <div class="mini-card w-90 bg-cinza">
                <h2>Clientes novos: {{ $clientesDia->count() }}</h2>
            </div>
            <div class="flex">
                <div class="mini-card bg-vermelho">
                    <h2>Classe A</h2>
                    <div class="number">
                        {{ $clientesDia->whereNotNull("Renda")->where("Renda", "<=", 980)->count() }}
                    </div>
                </div>
                <div class="mini-card bg-amarelo">
                    <h2>Classe B</h2>
                    <div class="number">
                        {{ $clientesDia->whereNotNull("Renda")->where("Renda", ">", 980)->where("Renda", "<=", 2500)->count() }}
                    </div>
                </div>
                <div class="mini-card bg-verde">
                    <h2>Classe C</h2>
                    <div class="number">
                        {{ $clientesDia->whereNotNull("Renda")->where("Renda", ">", 2500)->count() }}
                    </div>
                </div>
                <div class="mini-card bg-cinza">
                    <h2>Não definida</h2>
                    <div class="number">
                        {{ $clientesDia->whereNull("Renda")->count() }}
                    </div>
                </div>
            </div>
        </div>
        <div id="dadosSemana" class="mini-card bg-cinza2 w-90" style="display: none">
            <div class="mini-card w-90 bg-cinza">
                <h2>Clientes novos: {{ $clientesSemana->count() }}
            </div>
            <div class="flex">
                <div class="mini-card bg-vermelho">
                    <h2>Classe A</h2>
                    <div class="number">
                        {{ $clientesSemana->whereNotNull("Renda")->where("Renda", "<=", 980)->count() }}
                    </div>
                </div>
                <div class="mini-card bg-amarelo">
                    <h2>Classe B</h2>
                    <div class="number">
                        {{ $clientesSemana->whereNotNull("Renda")->where("Renda", ">", 980)->where("Renda", "<=", 2500)->count() }}
                    </div>
                </div>
                <div class="mini-card bg-verde">
                    <h2>Classe C</h2>
                    <div class="number">
                        {{ $clientesSemana->whereNotNull("Renda")->where("Renda", ">", 2500)->count() }}
                    </div>
                </div>
                <div class="mini-card bg-cinza">
                    <h2>Não definida</h2>
                    <div class="number">
                        {{ $clientesSemana->whereNull("Renda")->count() }}
                    </div>
                </div>
            </div>
        </div>
        <div id="dadosMes" class="mini-card bg-cinza2 w-90" style="display: none">
            <div class="mini-card w-90 bg-cinza">
                <h2>Clientes novos: {{ $clientesMes->count() }}
            </div>
            <div class="flex">
                <div class="mini-card bg-vermelho">
                    <h2>Classe A</h2>
                    <div class="number">
                        {{ $clientesMes->whereNotNull("Renda")->where("Renda", "<=", 980)->count() }}
                    </div>
                </div>
                <div class="mini-card bg-amarelo">
                    <h2>Classe B</h2>
                    <div class="number">
                        {{ $clientesMes->whereNotNull("Renda")->where("Renda", ">", 980)->where("Renda", "<=", 2500)->count() }}
                    </div>
                </div>
                <div class="mini-card bg-verde">
                    <h2>Classe C</h2>
                    <div class="number">
                        {{ $clientesMes->whereNotNull("Renda")->where("Renda", ">", 2500)->count() }}
                    </div>
                </div>
                <div class="mini-card bg-cinza">
                    <h2>Não definida</h2>
                    <div class="number">
                        {{ $clientesMes->whereNull("Renda")->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/relatorio.js"></script>
@endsection