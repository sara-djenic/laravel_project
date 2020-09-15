@extends("layouts.admin")

@section("content")
    @include("errors.errors")
    <form action="/genres/create" method="POST">
        @csrf
        Name: <input type="text" name="name">
        <input type="submit">
    </form>
@endsection
