<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status_activity;

class Status_activityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $status_activities = Status_activity::select(
            'status_activities.status',
        )->get();
        return $status_activities;
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
