@extends("layouts.home")
@section("content")
    <div class="container">

        <div class="row mt-5">
            <div class="col-lg-9">

                <div class="row">
                    @foreach($movies as $movie)
                        <div class="col-12">
                            <div class="card h-100">
                                <p>
                                    Rating:{{$movie->sumRating == 0?"Not rated":$movie->sumRating}}
                                </p>
                                <a href="/movie/show/{{$movie->id}}"><img style="height: 200px; width: 150px" class="card-img-top" src="{{asset('/').$movie->image}}" alt=""></a>
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
