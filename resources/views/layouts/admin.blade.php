@extends("layouts.master")

@section("titulo") Administrador @endsection

@section("body")
        <ul>
            <li><a href="{{ route("admin.index") }}">Home</a></li>
            <li><a href="{{ route("admin.clientes") }}">Clientes</a></li>
            <li style="float:right"><a class="sair" href="{{ route("login.logout") }}">Sair</a></li>
            <li style="float:right"><a class="user">{{ auth()->user()->name }}</a></li>
        </ul>
    </nav>
    <main>
        @section("conteudo")

        @show
    </main>
@endsection