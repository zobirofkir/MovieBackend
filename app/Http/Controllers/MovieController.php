<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchReaquest;
use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private $movies;

    public function __construct(MovieService $movies)
    {
        return $this->movies = $movies;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($page)
    {
        return $this->movies->getMovies($page);
    }

    /**
     * Search Movie
     */
    public function search(SearchReaquest $request)
    {
        $query = $request->validated('query');
        return $this->movies->searchMovie($query);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($page, $movieId)
    {
        return $this->movies->showMovie($movieId, $page);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
