<?php

namespace App\Http\Controllers;

use App\Models\Assortiment;
use Illuminate\Http\Request;

class AssortimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assortiment  $assortiment
     * @return \Illuminate\Http\Response
     */
    public function show(Assortiment $assortiment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assortiment  $assortiment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assortiment $assortiment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assortiment  $assortiment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assortiment $assortiment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assortiment  $assortiment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assortiment $assortiment)
    {
        //
    }
}
