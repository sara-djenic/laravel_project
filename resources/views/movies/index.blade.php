
@extends("layouts.home")
@section("content")
    <div class="container">

        <div class="row mt-5">
            <div class="col-lg-9">

                <div class="row">
                    @foreach($movies as $movie)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="/movie/show/{{$movie->id}}"><img class="card-img-top" src="{{asset('/').$movie->image}}" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="/movie/show/{{$movie->id}}">{{$movie->title}}</a>
                                    </h4>

                                    <p>
                                        @foreach($movie->genres as $genre)
                                            <span class="badge badge-secondary">{{$genre->name}}</span>
                                        @endforeach
                                    </p>
                                    <p>
                                        {{$movie->description}}
                                    </p>
                                </div>

                            </div>
                        </div>

                    @endforeach




                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>



@endsection
