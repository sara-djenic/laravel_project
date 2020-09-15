@extends("layouts.admin")


@section("content")
    @include("errors.errors")
    <form action="/actor/edit/{{$actor->id}}" method="POST">
        @csrf
        First name: <input type="text" name="first_name" value="{{$actor->first_name}}">
        Last name: <input type="text" name="last_name" value="{{$actor->last_name}}">
        Biography: <input type="text" name="bio" value="{{$actor->bio}}">
        <input type="submit" value="update">
    </form>
@endsection
