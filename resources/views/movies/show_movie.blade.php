@extends("layouts.home")
@section("content")
    @include("errors.errors")





    <div class="container">

        <div class="row mt-5">
            <div class="col-lg-9">

                <div class="row">

                    <div class="col-12">
                        <div class="card h-100">
                            <img style="height: 200px; width: 150px" class="card-img-top" src="{{asset('/').$movie->image}}" alt="">
                            <div class="card-body">
                                <h4 class="card-title">
                                   {{$movie->title}}
                                </h4>
                                <p>
                                    @foreach($movie->genres as $genre)
                                        <span class="badge badge-secondary">{{$genre->name}}</span>
                                    @endforeach
                                </p>
                                <p>{{$movie->description}}</p>
                                <div>
                                    @foreach($movie->actors as $a)
                                        <p>{{$a->first_name}} {{$a->last_name}}</p>
                                    @endforeach
                                </div>
                                <p>Rating:{{$rating == 0?"Not rated":$rating/count($movie->rating)}}</p>
                                @if(session()->has("user") && session("user")->role == "user")
                                    <form action="/movie/rate" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_movie" value="{{$movie->id}}">
                                        RATE: <select name="rate">
                                            <option value="10">10</option>
                                            <option value="9">9</option>
                                            <option value="8">8</option>
                                            <option value="7">7</option>
                                            <option value="6">6</option>
                                            <option value="5">5</option>
                                            <option value="4">4</option>
                                            <option value="3">3</option>
                                            <option value="2">2</option>
                                            <option value="1">1</option>
                                        </select>
                                        <input type="submit" value="rate">
                                    </form>
                                    @if($movie->likes->contains(session("user")->id))
                                        <a class="btn btn-primary" href="/movie/unlike/{{$movie->id}}">Dislike</a>

                                    @else
                                        <a class="btn btn-primary" href="/movie/like/{{$movie->id}}">Like</a>
                                    @endif
                                    <form action="/movie/comment" method="POST">
                                        @csrf
                                        <input type="hidden" name="commentMovieId" value="{{$movie->id}}">
                                        <textarea name="comment" id="" cols="30" rows="10"></textarea>
                                        <input type="submit" value="comment">
                                    </form>
                                @endif
                            </div>

                        </div>
                    </div>

                    @foreach($movie->comm as $comment)
                        <div class="row">
                            <div class="col-12">{{$comment->name}}: {{$comment->pivot->comment}}</div><br/>

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
