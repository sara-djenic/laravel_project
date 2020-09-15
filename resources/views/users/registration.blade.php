@extends("layouts.home")

@section("content")
@include("errors.errors")
    <form action="/user/create" method="POST">
        @csrf
        Username: <input type="text" name="name">
        Email: <input type="email" name="email">
        Password: <input type="password" name="password">
        Confirm password: <input type="password" name="password_confirmation">
        <input type="submit">
    </form>
@endsection
