<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Label;
use App\Models\Category;
use App\Models\Course;
use App\Models\Activity;
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('events.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $labels=Label::all();
        $courses=Course::all();

        return view('events.create',compact('categories','labels','courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo $request -> name;
        echo $request -> course;
        echo $request -> category;
        echo $request -> schedule;
        echo $request -> time;
        echo $request -> label;
        echo $request -> description;

        Activity::create([
            'name' => $request->name,
            'description' => $request->description,
            'image'=> $request->name,
            'date' => $request->schedule,
            'hour' => $request->time,
            'labels_id' => $request->label,
            'categories_id' => $request->category,
            'status_activities_id' => $request->course
         ]
        );




        return view('events.index');;
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
