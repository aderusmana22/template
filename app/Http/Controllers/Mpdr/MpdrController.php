<?php

namespace App\Http\Controllers\Mpdr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MpdrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \view('page.mpdr.list-mpdr');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('page.mpdr.create-mpdr');
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
        return \view('page.mpdr.edit-mpdr');
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

    public function report()
    {
        return view('page.mpdr.report-mpdr');
    }
}
