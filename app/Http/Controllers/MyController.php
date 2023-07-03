<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Movie;
use App\Models\Platform;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyController extends Controller
{

    public function showmovies() {
        $movies = Movie::all();
        return view('welcome', ['movies'=>$movies]);
    }
    

    public function addfilm() {
        $tags = Tag::all();

        $platforms = Platform::all();

        return view('addfilm', compact('tags', 'platforms'));
    }


    public function storefilm(MovieRequest $request) {

        $movie = Movie::create([
            'user_id'=> Auth::user()->id,
            'name'=>$request->input('name'),
            'director'=>$request->input('director'),
            'year'=>$request->input('year'),
            'description'=>$request->input('description'),
            'img'=>$request->file('img')->store('public/movies'),
        ]);
        
        $movie->tags()->attach($request->input('tags'));

        $movie->platforms()->attach($request->input('platforms'));

        return to_route('home')->with('message', "Movie aggiunto correttamente");
    }


    public function show(Movie $film){

        return view('movieshow', ['movie'=> $film]);
    }


    public function edit(Movie $movie){

        $tags = Tag::all();
        $platforms = Platform::all();

        return view('editfilm', compact('movie', 'tags', 'platforms'));
    }


    public function update(Request $request, Movie $movie){

        $imgOldMovie = $movie->img;

        $movie->update([
            'name'=>$request->input('name'),
            'director'=>$request->input('director'),
            'year'=>$request->input('year'),
            'description'=>$request->input('description'),
            'img'=>($request->file('img')==null)? $movie->img : $request->file('img')->store('public/movies'),
        ]);
        
        $movie->tags()->detach();
        $movie->tags()->attach($request->input('tags'));
        $movie->platforms()->detach();
        $movie->platforms()->attach($request->input('platforms'));

        if($request->file('img')!==null){
            Storage::delete($imgOldMovie);
        }

        return to_route('home')->with('message', "Film modificato");
    }

    public function delete(Movie $movie){
        $movie->delete();
        Storage::delete($movie->img);
        return to_route('home')->with('message', "film eliminato correttamente");
    }


}
