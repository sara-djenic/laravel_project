@extends("layouts.admin")


@section("content")
    @include("errors.errors")
    <form action="/movie/edit/{{$movie->id}}" method="POST">
        @csrf
        Title: <input type="text" value="{{$movie->title}}" name="title">
        Description: <input type="text" value="{{$movie->description}}" name="description">
        <div class="row">
            <h1>Genres</h1>
            <div class="col-12">
                @foreach($genres as $genre)
                    Genre: {{$genre->name}}<input  type="checkbox" value="{{$genre->id}}" {{in_array($genre->id, $present_genres)?'checked="checked"':''}} name="e_checkbox_genre[]">
                @endforeach
            </div>
        </div>

        <div class="row">
            <h1>Actors</h1>
            <div class="col-12">
                @foreach($actors as $actor)
                    Actor: {{$actor->first_name}} {{$actor->last_name}}<input  type="checkbox" value="{{$actor->id}}" {{in_array($actor->id, $present_actors)?'checked="checked"':''}} name="e_checkbox_actor[]">
                @endforeach
            </div>
        </div>

        <input type="submit" value="update">
    </form>

@endsection
