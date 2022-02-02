<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Auth;
use DB;
use App\User;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $movies=Movie::all();
        if($request->isMethod('post')){

            $user_id= Auth::user()->id;
            $movie=$request->all();
            $movie= new Movie;
            $movie_2 = Movie::where('movieName', $request->movieName)->where('user_id', $user_id)->first();

    if (!empty($movie_2)) {
       echo("Movie Already Exists In Playlist");
     //  Alert::success('Movie Already Exists In Playlist!', 'Success Message');
    } else {
            $movie->user_id=auth()->id();
            $movie->link_radio=$request->link_radio;
            $movie->movieName=$request->movieName;
            $movie->Released=$request->Released;
            $movie->Runtime=$request->Runtime;
            $movie->Genre=$request->Genre;
            // $product->Poster=$filename;
            $movie->Actors=$request->Actors;
              $movie->Director=$request->Director;
            $movie->save();
            if($movie)
            {
              //Alert::success('Movie Successfully Added!', 'Success Message');
                
        return redirect('/display-movie');
                   
            }    
        }
            
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function displayMovie(Request $request)
    {
         //$movies=$request->all();
        $user_id= Auth::user()->id;
         $movie_type=$request->playlist;
         if($movie_type == "1"){
                $movie = Movie::where('user_id', $user_id)->get();
         }   else{
                $movie=Movie::all();
         }  
       
        return view('authors.index',compact('movie'));
    }


    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      

            $request->validate([
                'name'=>'required'
        ]);

            Movie::create($request->only('name'));
            return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        
    }
}
