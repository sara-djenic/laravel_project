@extends("layouts.home")

@section("content")
    <div class="container">

        <div class="row mt-5">
            <div class="col-lg-9">

                <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{$actor->first_name}} {{$actor->last_name}}
                                    </h4>


                                    <p>Biography: {{$actor->bio}}</p>
                                    <div>
                                        @foreach($actor->movies as $movie)
                                            <a href="/movie/show/{{$movie->id}}">{{$movie->title}}</a>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>

@endsection
