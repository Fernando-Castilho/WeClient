@extends("layouts.admin")

@php
    if(!isset($cliente)){
        $cliente = new \App\Models\Cliente();
        $titulo = "Cadastrar";
        $route = route("cliente.cadastrar");
    }
    else{
        $titulo = "Atualizar";
        $route = route("cliente.atualizar", ["id" => $cliente->Id]);
    }
@endphp

@section("conteudo")
    <div class="form-cliente">
        <form action="{{ $route }}" method="post">
            @csrf
            @if($cliente->Id != 0)
                @method("put")
            @endif
            <h1 class="title">{{ $titulo }} cliente</h1>
            
            <div class="entry">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required maxlength="150" value="{{ $cliente->Nome }}" />
                @error("nome")
                    <div class="error">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="entry">
                <label for="cpf">CPF</label>
                <input type="number" name="cpf" id="cpf" required minlength="11" maxlength="11" value="{{ $cliente->Cpf }}" />
                @error("cpf")
                    <div class="error">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="entry">
                <label for="dataNascimento">Data de Nascimento</label>
                <input type="date" name="dataNascimento" id="dataNascimento" required value="{{ $cliente->DataNascimento }}" />
                @error("dataNascimento")
                    <div class="error">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="entry">
                <label for="renda">Renda familiar</label>
                <input type="number" name="renda" id="renda" min="0" step=".01" value="{{ $cliente->Renda }}" />
                @error("renda")
                    <div class="error">
                        <span>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-azul">{{ $titulo }}</button>
        </form>
    </div>
@endsection