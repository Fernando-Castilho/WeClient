@extends("layouts.master")

@section("titulo") Login @endsection

@section("body")
    <div class="text-center">
        <form method="post" action="{{ route("login.login") }}">
            <h1 class="title">Login</h1>
            @error("erro")
                <span> {{ $message }} </span>
            @enderror
            @csrf
            <input type="email" name="email" required>
            @error("email")
                <span> {{ $message }} </span>
            @enderror
            <input type="password" name="password" required>
            @error("password")
                <span> {{ $message }} </span>
            @enderror
            <button type="submit">Login</button>
        </form>
    </div>
@endsection