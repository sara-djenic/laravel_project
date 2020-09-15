@extends("layouts.admin")

@section("content")
    @include("errors.errors")
    <form action="/actors/create" method="POST">
        @csrf
        First name: <input type="text" name="first_name">
        Last name: <input type="text" name="last_name">
        Biography: <input type="text" name="bio">
        <input type="submit">
    </form>
@endsection
