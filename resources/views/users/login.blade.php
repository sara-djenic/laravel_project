@extends("layouts.home")

@section("content")
    @include("errors.errors")
    <form action="/login" method="POST">
        @csrf
        Username: <input type="text" name="username">
        Password: <input type="password" name="password">
        <input type="submit">
    </form>
@endsection
