<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return Film::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        Film::create($request->all());
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Film $film
     */
    public function show(Film $film)
    {
        return $film;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \App\Film $film
     */
    public function update(Request $request, Film $film)
    {
        $film->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param  \App\Film $film
     */
    public function destroy(Film $film): void
    {
        $film->delete();
    }
}