<?php

namespace App\Http\Controllers;

use App\Models\Movie;
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
        return view('addfilm');
    }


    public function storefilm(MovieRequest $request) {

        Movie::create([
            'user_id'=> Auth::user()->id,
            'name'=>$request->input('name'),
            'director'=>$request->input('director'),
            'year'=>$request->input('year'),
            'description'=>$request->input('description'),
            'img'=>$request->file('img')->store('public/movies'),
        ]);
        
        return to_route('home')->with('message', "Movie aggiunto correttamente");
    }


    public function show(Movie $film){

        return view('movieshow', ['movie'=> $film]);
    }


    public function edit(Movie $movie){
        return view('editfilm', ['movie'=> $movie]);
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
