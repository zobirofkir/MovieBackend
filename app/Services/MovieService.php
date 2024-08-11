<?php
namespace App\Services;

use GuzzleHttp\Client;

class MovieService {
    //Create Private $client
    private $client;


    /**
     * Make Dipandacy Injection (Client)
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        return $this->client = $client;
    }

    /**
     * Get Movies
     *
     * @param [type] $page
     * @return void
     */
    public function getMovies($page)
    {
        $apiKey = env("MOVIE_API_KEY");
        $url = env("MOVIE_URL");
        $response = $this->client->request('GET', $url, [
            'query' => [
                'api_key' => $apiKey,
                'language' => 'en-US', 
                'page' => $page
            ]
        ]);
        $movies = json_decode($response->getBody(), true);
        return response()->json($movies);
    }

    /**
     * Search Movie
     *
     * @param [type] $query
     * @return void
     */
    public function searchMovie($query)
    {
        $apiKey = env("MOVIE_API_KEY");
        $searchUrl = env("MOVIE_SEARCH_URL");
        
        $response = $this->client->request("GET", $searchUrl, [
            'query' => [
                'api_key' => $apiKey,
                'language' => 'en-US', 
                'query' => $query
            ]
        ]);
        $movies = json_decode($response->getBody(), true);
        return response()->json($movies);
    }

    /**
     * Show Movie
     */
    public function showMovie($movieId, $page)
    {
        $apiKey = env("MOVIE_API_KEY");
        $showMovieUrl = str_replace('{movie_id}', $movieId, env("MOVIE_DETAILS_URL"));
    
        $response = $this->client->request("GET", $showMovieUrl, [
            'query' => [
                'api_key' => $apiKey,
                'language' => 'en-US',
                'page' => $page
            ]
        ]);
    
        $movieDetails = json_decode($response->getBody(), true);
        return response()->json($movieDetails);
    }
}    