@extends("layouts.master")

@section("head")
    <link rel="stylesheet" href="/css/login.css">
    @parent
@stop

@section("titulo") Login @endsection

@section("body")
    <div class="login-container bg-cinza2">
        <form method="post" action="{{ route("login.login") }}">
            <h1 class="title">Login</h1>
            @error("erro")
                <span> {{ $message }} </span>
            @enderror
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            @error("email")
                <div class="error">
                    <span>{{ $message }}</span>
                </div>
            @enderror
            <input type="password" name="password" placeholder="Senha" required>
            @error("password")
                <div class="error">
                    <span>{{ $message }}</span>
                </div>
            @enderror
            <button type="submit" class="active">Login</button>
        </form>
    </div>
@endsection