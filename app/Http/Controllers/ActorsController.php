<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Movie;
use Illuminate\Http\Request;


class ActorsController extends Controller
{
    public function create()
    {
        request()->validate([
            "first_name" => "required",
            "last_name" => "required",
            "bio" => "required"
        ]);
        $first_name = request()->first_name;
        $last_name = request()->last_name;
        $bio = request()->bio;

        $created = Actor::create(["first_name" => $first_name, "last_name" => $last_name, "bio" => $bio]);

        if($created)
        {
            session()->flash('success', 'Actor added');
            return redirect()->back();
        }else{
            session()->flash('errors', 'Creating failed');
            return redirect()->back();
        }
    }
    public function show()
    {
        return view("actors/create");
    }
    public function show_all()
    {
        $actors = Actor::all();
        return view("actors/show_all", ["actors"=>$actors]);
    }
    public function show_all_admin()
    {
        $actors = Actor::all();
        return view("/actors/admin_show_all", ["actors"=>$actors]);
    }

    public function edit($id)
    {
        $actor = Actor::find($id);
        return view("actors/edit", ["actor"=>$actor]);
    }
    public function update($id)
    {
        $actor = Actor::find($id);
        request()->validate([
            "first_name" => "required",
            "last_name" => "required",
            "bio" => "required"
        ]);
        $updated = $actor->update(["first_name" => request()->first_name,
                        "last_name" => request()->last_name,
                        "bio" => request()->bio]);
        if($updated)
        {
            session()->flash('success', 'Actor updated');
            return redirect()->back();
        }else{
            session()->flash('error', 'Updating failed');
            return redirect()->back();
        }
    }
    public function delete($id)
    {
        $actor = Actor::find($id);
        $deleted = $actor->delete();
        if($deleted)
        {
            session()->flash('success', 'Actor deleted');
            return redirect()->back();
        }else{
            session()->flash('error', 'Deleting failed');
            return redirect()->back();
        }
    }
    public function show_movies($id)
    {
        $actor = Actor::with('movies')->where("id", $id)->first();
        return view("actors/show_movies", ["actor"=>$actor]);
    }
}
