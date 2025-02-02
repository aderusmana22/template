<?php

namespace App\Http\Controllers\PreMpdr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreMpdrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.pre-mpdr.list-prempdr');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.pre-mpdr.create-prempdr');

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
        return view('page.pre-mpdr.edit-prempdr');

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
        return view('page.pre-mpdr.report-prempdr');
    }

    public function approval()
    {
        return view('page.pre-mpdr.approval-prempdr');
    }

    public function log()
    {
        return view('page.pre-mpdr.log-prempdr');
    }
}
