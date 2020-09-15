@extends("layouts.admin")

@section("content")
    @include("errors.errors")
    <div class="container">


        @foreach($actors as $actor)
            <div class="row">
                <div class="col-4">
                    <p>First Name: {{$actor->first_name}} Last Name: {{$actor->last_name}}</p>
                </div>
                <div class="col-4">
                    <a class="btn btn-primary" href="/actor/edit/{{$actor->id}}">Edit</a>
                </div>
                <div class="col-4">
                    <a class="btn btn-primary" href="/actor/delete/{{$actor->id}}">Delete</a>
                </div>
            </div>

        @endforeach
    </div>
@endsection
