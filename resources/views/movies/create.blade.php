@extends("layouts.admin")

@section("content")
    @include("errors.errors")
    <form action="/movies/create" method="POST" enctype="multipart/form-data">
        @csrf
        Title: <input type="text" name="title">
        Description: <input type="text" name="description">
        Image:  <input type="file" name="image" class="form-control">
        @foreach($genres as $genre)
            Genre: {{$genre->name}}<input type="checkbox" value="{{$genre->id}}" name="checkbox_genre[]">
        @endforeach
        @foreach($actors as $actor)
            Actor: {{$actor->first_name}} {{$actor->last_name}}<input type="checkbox" value="{{$actor->id}}" name="checkbox_actor[]">
        @endforeach
        <input type="submit">
    </form>



    @endsection
