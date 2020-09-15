<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Movie;
use App\Genre;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genres')->get();
        return view("movies/index", ["movies" => $movies]);
    }
    public function create()
    {

        request()->validate([
            "title" => "required",
            "description" => "required",
            "image" => "required|mimes:jpeg,jpg,png"
        ]);

        $title = request()->title;
        $desc = request()->description;
        $file = request()->file("image");

        $fileName = time().$file->getClientOriginalName();

        $file->move(public_path()."/img", $fileName);



        $created = Movie::create(["title" => $title, "description" => $desc, "image"=> "img/$fileName"]);

        if($created)
        {
            if(!empty(request()->checkbox_genre)){
                foreach (request()->checkbox_genre as $genre){
                    $created->genres()->attach($genre);
                }
            }

            if(!empty(request()->checkbox_actor)){
                foreach (request()->checkbox_actor as $actor){
                    $created->actors()->attach($actor);
                }
            }

            session()->flash('success', 'Movie created');
            return redirect()->back();
        }else{
            session()->flash('error', 'Creating failed');
            return redirect()->back();
        }
    }
    public function show()
    {
        $actors = Actor::all();
        $genres = Genre::all();
        return view("movies/create", ["actors" => $actors, "genres" => $genres]);
    }

    public function edit($id)
    {
        $movie = Movie::with('genres', 'actors')->where("id", $id)->first();
        $actors = Actor::all();
        $genres = Genre::all();
        $present_actors = [];
        $present_genres = [];
        foreach ($movie->actors as $actor){
            array_push($present_actors, $actor->id);
        }
        foreach ($movie->genres as $genre){
            array_push($present_genres, $genre->id);
        }
        return view("movies/edit", ["movie" => $movie, "actors" => $actors, "genres" => $genres, "present_genres" => $present_genres, "present_actors" => $present_actors]);
    }
    public function update($id)
    {
        $movie = Movie::find($id);
        request()->validate([
            "title" => "required",
            "description" => "required"
        ]);
        $title = request()->title;
        $desc = request()->description;

        $movie->title = $title;
        $movie->description = $desc;
        $movie->genres()->detach();
        $movie->actors()->detach();
        $updated = $movie->update();


        if($updated)
        {

            if(!empty(request()->e_checkbox_genre)){
                foreach (request()->e_checkbox_genre as $genre){
                    $movie->genres()->attach($genre);
                }
            }

            if(!empty(request()->e_checkbox_actor)){
                foreach (request()->e_checkbox_actor as $actor){
                    $movie->actors()->attach($actor);
                }
            }


            session()->flash('success', 'Movie updated');
            return redirect()->back();
        }else{
            session()->flash('error', 'Updating failed');
            return redirect()->back();
        }
    }
    public function admin_index()
    {
        $movies = Movie::all();
        return view("movies/admin", ["movies" => $movies]);
    }
    public function delete($id)
    {
        $movie = Movie::find($id);
        $deleted = $movie->delete();
        if($deleted)
        {
            session()->flash('success', 'Movie deleted');
            return redirect()->back();
        }else{
            session()->flash('error', 'Deleting failed');
            return redirect()->back();
        }

    }
    public function rate()
    {
        $user = session('user')->id;

        $movie = Movie::find(request()->id_movie);

        if($movie->rating->contains($user))
        {
            session()->flash('error', 'Already rated');
            return redirect()->back();
        }else{
            $movie->rating()->attach($user, ["grade" => request()->rate]);
            session()->flash('success', 'Thanks for rating');
            return redirect()->back();
        }

    }
    public function top_lists()
    {
        $movies = Movie::with('rating')->get();

        foreach ($movies as $movie)
        {
            if(count($movie->rating) != 0){
                $movie->sumRating = $movie->rating->sum('pivot.grade')/count($movie->rating);
            }else{
                $movie->sumRating = 0;
            }

        }

        return view("movies/top_lists", ["movies"=>$movies->sortByDesc("sumRating")->all()]);
    }
    public function show_movie($id)
    {
        $movie = Movie::with('genres', 'actors', 'rating', "likes", "comm")->where("id", $id)->first();
        $graded = $movie->rating->sum('pivot.grade');

        return view("movies/show_movie", ["movie"=>$movie, "rating"=>$graded]);
    }
    public function like($id)
    {
        $movie = Movie::find($id);
        $movie->likes()->attach(session("user")->id);
        session()->flash("success", "OK with like");
        return redirect()->back();
    }
    public function unlike($id)
    {
        $movie = Movie::find($id);


        $movie->likes()->detach(session("user")->id);
        session()->flash("success", "OK with unlike");
        return redirect()->back();
    }
    public function comment_movie()
    {
            $movie = Movie::find(request()->commentMovieId);
            $movie->comm()->attach(session("user")->id, ["comment" => request()->comment]);
            session()->flash("success", "Thank you for comment");
            return redirect()->back();
    }
    public function recommended()
    {
        $user = session("user");

        $movies = Movie::with("genres")->whereHas('likes', function($q) use ($user){
            $q->where("user_id", $user->id);
        })->get();

        $recommended = [];
        foreach ($movies as $movie){
            foreach ($movie->genres as $genre){
                if(!in_array($genre->id, $recommended)){
                    array_push($recommended, $genre->id);
                }
            }
        }

        $moviesR = Movie::whereHas("genres", function($q) use($recommended){
                $q->whereIn("genres.id", $recommended);
        })->get();

        return view("movies/recommended", ["moviesR"=>$moviesR]);
    }
}
