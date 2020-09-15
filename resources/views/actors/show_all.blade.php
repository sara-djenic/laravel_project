@extends("layouts.home")

@section("content")
    <div class="container">

        <div class="row mt-5">
            <div class="col-lg-9">

                <div class="row">
                    @foreach($actors as $actor)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="/actors/show_movies/{{$actor->id}}"> {{$actor->first_name}} {{$actor->last_name}}</a>
                                    </h4>


                                    <p>Biography: {{$actor->bio}}</p>
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
