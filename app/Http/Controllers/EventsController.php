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
        $events = Activity::with(['labels', 'categories'])->get();
        return view('events.index', compact('events'));
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
       
        if($request->hasFile('file')){
            $image=$request->file('file');
            $filename=$request->name.$image->getClientOriginalName();
            $image->move(public_path('imgs'),$filename);

        }else{
            $filename='default.png';
        }


        Activity::create([
            'name' => $request->name,
            'description' => $request->description,
            'image'=> $filename,
            'date' => $request->schedule,
            'hour' => $request->time,
            'labels_id' => $request->label,
            'categories_id' => $request->category,
            'courses_id' => $request->course
         ]
        );




        return view('events.layout');;
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
        $event = Activity::find($id);
        $categories=Category::all();
        $labels=Label::all();

        return view('events.edit',compact('event','categories','labels'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        //
        $query = Activity::findOrFail($id);
        if ($query) {
            $query->update([
                'name' => $request->name,
                'categories_id' => $request->category,
                'date' => $request->schedule,
                'hour' => $request->time,
                'labels_id' => $request->label,
                'description' => $request->description
            ]);

        return redirect()->route('events.index')->with('success', 'Activity updated successfully');
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $event = Activity::find($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Activity deleted successfully');
    }
}
