@extends("layouts.master")

@section("titulo") Administrador @endsection

@section("body")
    <nav>
        <a href="{{ route("admin.index") }}">Home</a>
        <a href="{{ route("admin.clientes") }}">Clientes</a>
        {{ auth()->user()->name }}

        <a href="{{ route("login.logout") }}"><button>Sair</button></a>
    </nav>
    <main>
        @section("conteudo")

        @show
    </main>
@endsection