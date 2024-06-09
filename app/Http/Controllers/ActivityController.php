<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activities= Activity::select(
            'activities.id',
            'activities.name',
            'activities.description',
            'activities.image',
            'activities.date',
            'activities.hour',
            'labels.name as labels_name',
            'courses.name as courses_name',
            'categories.name as categories_name',
        )
        ->join('labels', 'activities.labels_id', '=', 'labels.id')
        ->join('courses', 'activities.courses_id', '=', 'courses.id')
        ->join('categories', 'activities.categories_id', '=', 'categories.id')
        ->get();
        return $activities;
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


    public function day(){
        $activities= Activity::select(
            'activities.date',
        )
        ->get();
        return $activities;
    }

    public function findCourses ($id){
        $activities= Activity::select(
            'activities.id',
            'activities.name',
            'activities.description',
            'activities.image',
            'activities.date',
            'activities.hour',
            'labels.name as labels_name',
            'courses.name as courses_name',
            'categories.name as categories_name',
        )
        ->join('labels', 'activities.labels_id', '=', 'labels.id')
        ->join('courses', 'activities.courses_id', '=', 'courses.id')
        ->join('categories', 'activities.categories_id', '=', 'categories.id')
        ->where('activities.courses_id', $id)
        ->get();
        return $activities;

    }

}
