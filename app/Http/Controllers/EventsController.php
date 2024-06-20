<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Label;
use App\Models\Category;
use App\Models\Course;
use App\Models\Activity;
use Illuminate\Support\Carbon;
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Activity::with(['labels', 'categories', 'courses'])->get();
        $categories = Category::all();
        return view('events.index', compact('events', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $labels=Label::all();
        $courses=Course::all();
        $now = Carbon::now();
        list($date, $time) = explode(' ', $now);
    

        return view('events.create',compact('categories','labels','courses','date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        if($request->hasFile('file')){
            $image=$request->file('file');
            $filename=$request->name.time().$image->getClientOriginalName();
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
            'courses_id' => $request->course,
            "status_activities_id" => 1
         ]
        );




        return redirect()->route('events.index')->with('success', 'Activity created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $event = Activity::select(
            'activities.id',
            'activities.name',
            'activities.date',
            'activities.hour',
            'activities.description',
            'activities.image',
            'labels.name as labels_name',
            'courses.name as courses_name',
            'categories.name as categories_name',
            'status_activities.status as status_activities_name'
        )
        ->join('labels', 'activities.labels_id', '=', 'labels.id')
        ->join('courses', 'activities.courses_id', '=', 'courses.id')
        ->join('categories', 'activities.categories_id', '=', 'categories.id')
        ->join('status_activities', 'activities.status_activities_id', '=', 'status_activities.id')
        ->where('activities.id', $id)
        ->first();


        return view('events.show', compact('event'));
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
        $courses=Course::all();

        return view('events.edit',compact('event','categories','labels', 'courses'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        //
        $query = Activity::findOrFail($id);
        if ($query) {
            if ($request->hasFile('file')) {
                $previousImage = public_path('imgs/' . $query->image);
                if ($query->image !== 'default.png' && file_exists($previousImage)) {
                    unlink($previousImage);
                }
                
                $image = $request->file('file');
                $filename = $request->name .time(). $image->getClientOriginalName();
                $image->move(public_path('imgs'), $filename);
                $query->update([
                    'image' => $filename
                ]);
            }

            $query->update([
                'name' => $request->name,
                'courses_id' => $request->course,
                'categories_id' => $request->category,
                'date' => $request->schedule,
                'hour' => $request->time,
                'labels_id' => $request->label,
                'description' => $request->description
            ]);

            return redirect()->route('events.index')->with('success', 'Activity updated successfully');
        } else {
            return redirect()->route('events.index')->with('error', 'Activity not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $event = Activity::find($id);
        if ($event) {

            $imagePath = public_path('imgs/' . $event->image);
            if ($event->image !== 'default.png' && file_exists($imagePath)) {
                unlink($imagePath);
            }
            $event->delete();
    
            return redirect()->route('events.index')->with('success', 'Activity deleted successfully');
        } else {
            return redirect()->route('events.index')->with('error', 'Activity not found');
        }
    }

    public function search(Request $request)
    {
        $query = Activity::select(
            'activities.id',
            'activities.name',
            'activities.date',
            'activities.hour',
            'labels.name as labels_name',
            'courses.name as courses_name',
            'categories.name as categories_name',
        )
        ->join('labels', 'activities.labels_id', '=', 'labels.id')
        ->join('courses', 'activities.courses_id', '=', 'courses.id')
        ->join('categories', 'activities.categories_id', '=', 'categories.id')
        ->where('activities.status_activities_id', 1);

        if ($request->category != 0) {
            $query->where('activities.categories_id', $request->category);
        }

        if (!empty($request->event)) {
            $query->where('activities.name', 'LIKE', '%' . $request->event . '%');
        }

        $events = $query->get();

        return view('events.results', compact('events'));
    }
}
