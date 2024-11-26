<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsUpdatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexWeather()
    {
        return view('admin.News.Weather-Updates.index');
    }
    public function indexPest()
    {
        return view('admin.News.Pest.index');
    }
    public function indexMarket()
    {
        return view('admin.News.Market-Prices.index');
    }
    public function indexSeed()
    {
        return view('admin.News.Seed.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
