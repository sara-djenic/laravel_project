<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function create()
    {
        request()->validate([
            "name" => "required",
        ]);
        $name = request()->name;

        $created = Genre::create(["name" => $name, ]);

        if($created)
        {
            session()->flash('success', 'Genre created');
            return redirect()->back();
        }else{
            session()->flash('errors', 'Creating failed');
            return redirect()->back();
        }
    }
    public function show()
    {
        return view("/genres/create");
    }
    public function show_all()
    {
        $genres = Genre::all();
        return view("movies/index", ["zanrovi" => $genres]);
    }
}
