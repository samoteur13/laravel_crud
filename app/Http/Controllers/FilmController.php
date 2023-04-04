<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\FilmRequest;
use Illuminate\Http\RedirectResponse;

class FilmController extends Controller
{
    
    public function index($slug = null): View
    {
        $query = $slug ? Category::whereSlug($slug)->firstOrFail()->films() : Film::query();
        $films = $query->withTrashed()->oldest('title')->paginate(5);
        return view('index', compact('films', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FilmRequest $filmRequest)
    {
        Film::create($filmRequest->all());
        return redirect()->route('films.index')->with('info', 'Le film a bien été créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film): View
    {
        return view('show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        return view('edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FilmRequest $filmRequest, Film $film)
    {
        $film->update($filmRequest->all());

        return redirect()->route('films.index')->with('info', 'Le film a bien été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return back()->with('info', 'Le film a bien été mis dans la corbeille.');
    }

    public function forceDestroy($id): RedirectResponse
    {
        Film::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return back()->with('info', 'Le film a bien été supprimé définitivement dans la base de données.');
    }
    public function restore($id): RedirectResponse
    {
        Film::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('info', 'Le film a bien été restauré.');
    }
}
