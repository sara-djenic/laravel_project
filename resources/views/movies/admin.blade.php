@extends("layouts.admin")

@section("content")
    @include("errors.errors")
    <div class="container">


        @foreach($movies as $movie)
            <div class="row">
                <div class="col-4">
                    <p>Title: {{$movie->title}} </p>
                </div>
                <div class="col-4">
                    <a class="btn btn-primary" href="/movie/edit/{{$movie->id}}">Edit</a>
                </div>
                <div class="col-4">
                    <a class="btn btn-primary" href="/movie/delete/{{$movie->id}}">Delete</a>
                </div>
            </div>

        @endforeach
    </div>
@endsection
