<?php
namespace App\Services;

use GuzzleHttp\Client;

class TvService {
    private $client;

    /**
     * Dependencie Injectino
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        return $this->client = $client;
    }

    /**
     * List tv
     */
    public function listTv($page)
    {
        $apiKey = env("MOVIE_API_KEY");
        $tvUrl = env("TV_LIST");
        $response = $this->client->request("GET", $tvUrl, [
            'query' => [
                'api_key' => $apiKey,
                'language' => 'en-US',
                'page' => $page
            ]
        ]);
        $tvDetails = json_decode($response->getBody(), true);
        return response()->json($tvDetails);
    }

    /**
     * Show Tv
    */
     public function showTv($tvId, $page)
     {
         $apiKey = env("MOVIE_API_KEY");
         $showTvUrl = str_replace('{tv_id}', $tvId, env("TV_DETAILS_URL"));
 
         $response = $this->client->request("GET", $showTvUrl, [
             'query' => [
                 'api_key' => $apiKey,
                 'language' => 'en-US',
                 'page' => $page
             ]
         ]);
 
         $tvDetails = json_decode($response->getBody(), true);
         return response()->json($tvDetails);
     }
}