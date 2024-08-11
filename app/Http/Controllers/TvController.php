<?php

namespace App\Http\Controllers;

use App\Services\TvService;
use Illuminate\Http\Request;

class TvController extends Controller
{
    private $service;

    /**
     * Dependencie Injection
     *
     * @return void
     */
    public function __construct(TvService $service)
    {
        return $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($page)
    {
        return $this->service->listTv($page);
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
    public function show($page, $tvId)
    {
        return $this->service->showTv($tvId, $page);
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
