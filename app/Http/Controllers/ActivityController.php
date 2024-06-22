<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

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
        
        foreach ($activities as $activity) {
            $activity->image = "http://localhost/calenderbackend/public/imgs/".$activity->image;
        }

        $activities->transform(function($activity) {
            $activity->date = Carbon::parse($activity->date)->format('F j, Y');
            $activity->hour = Carbon::parse($activity->hour)->format('h:i A'); 
            return $activity;
        });

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
    public function show($id)
    {
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
            'status_activities.status as status_activities_name'
        )
        ->join('labels', 'activities.labels_id', '=', 'labels.id')
        ->join('courses', 'activities.courses_id', '=', 'courses.id')
        ->join('categories', 'activities.categories_id', '=', 'categories.id')
        ->join('status_activities', 'activities.status_activities_id', '=', 'status_activities.id')
        ->where('activities.id', $id)
        ->get();
        foreach ($activities as $activity) {
            $activity->image = "http://localhost/calenderbackend/public/imgs/".$activity->image;
        }

        $activities->transform(function($activity) {
            $activity->date = Carbon::parse($activity->date)->format('F j, Y');
            $activity->hour = Carbon::parse($activity->hour)->format('h:i A'); 
            return $activity;
        });

        return $activities;
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
        foreach ($activities as $activity) {
            $activity->image = "http://localhost/calenderbackend/public/imgs/".$activity->image;
        }

        $activities->transform(function($activity) {
            $activity->date = Carbon::parse($activity->date)->format('F j, Y');
            $activity->hour = Carbon::parse($activity->hour)->format('h:i A'); 
            return $activity;
        });

        return $activities;

    }


    public function statusTask (){
        $activities= Activity::select(
            'activities.id',
            'status_activities.status as status',
        )
        ->join('status_activities', 'activities.status_activities_id', '=', 'status_activities.id')
        ->get();
        return $activities;
        
    }

    public function completedTasksPerDay()
    {
        $today = now()->format('Y-m-d');

        $tasksToday = Activity::selectRaw('DATE(date) as day, name, activities.status_activities_id as activity_status, status_activities.status as status, COUNT(*) as count')
            ->whereRaw('DATE(date) = ?', [$today])
            ->where('activities.status_activities_id', 2)
            ->join('status_activities', 'status_activities_id', '=', 'status_activities.id')
            ->groupBy('day', 'name', 'activity_status', 'status')
            ->orderBy('day')
            ->get();

        $result = $tasksToday->map(function ($task) {
            return [
                'day' => $task->day,
                'name' => $task->name,
                'activity_status' => $task->status,
                'count' => $task->count
            ];
        });

        return response()->json($result);
    }

    public function completedTasksPerWeek() {

        $now = now();
        $startOfWeek = $now->copy()->startOfWeek();
        $endOfWeek = $now->copy()->endOfWeek();

        $tasksThisWeek = Activity::selectRaw('YEARWEEK(date) as week, name, activities.status_activities_id as activity_status, status_activities.status as status, COUNT(*) as count')
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->whereRaw('CONCAT(date, " ", hour) <= ?', [$now])
            ->where('activities.status_activities_id', 2)
            ->join('status_activities', 'status_activities_id', '=', 'status_activities.id')
            ->groupBy('week', 'name', 'activity_status', 'status')
            ->orderBy('week')
            ->get();


        $result = $tasksThisWeek->map(function ($task) {
            return [
                'week' => $task->week,
                'name' => $task->name,
                'activity_status' => $task->status,
                'count' => $task->count,
                
            ];
        });

        return response()->json($result);
    }

    public function pendingTasksPerDay()
    {
        $today = now()->format('Y-m-d');

        $tasksToday = Activity::selectRaw('DATE(date) as day, name, activities.status_activities_id as activity_status, status_activities.status as status, COUNT(*) as count')
            ->whereRaw('DATE(date) = ?', [$today])
            ->where('activities.status_activities_id', 1)
            ->join('status_activities', 'status_activities_id', '=', 'status_activities.id')
            ->groupBy('day', 'name', 'activity_status', 'status')
            ->orderBy('day')
            ->get();

        $result = $tasksToday->map(function ($task) {
            return [
                'day' => $task->day,
                'name' => $task->name,
                'activity_status' => $task->status,
                'count' => $task->count
            ];
        });

        return response()->json($result);
    }

    public function pendingTasksPerWeek() {

        $now = now();
        $startOfWeek = $now->copy()->startOfWeek();
        $endOfWeek = $now->copy()->endOfWeek();

        $tasksThisWeek = Activity::selectRaw('YEARWEEK(date) as week, name, activities.status_activities_id as activity_status, status_activities.status as status, COUNT(*) as count')
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->whereRaw('CONCAT(date, " ", hour) > ?', [$now])
            ->where('activities.status_activities_id', 1)
            ->join('status_activities', 'status_activities_id', '=', 'status_activities.id')
            ->groupBy('week', 'name', 'activity_status', 'status')
            ->orderBy('week')
            ->get();


        $result = $tasksThisWeek->map(function ($task) {
            return [
                'week' => $task->week,
                'name' => $task->name,
                'activity_status' => $task->status,
                'count' => $task->count,
                
            ];
        });

        return response()->json($result);
    }

    public function search($id,Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $activities = Activity::select(
            'activities.id',
            'activities.name',
            'activities.date',
            'activities.hour',
            'activities.description',
            'activities.image',
            'labels.name as labels_name',
            'courses.name as courses_name',
            'categories.name as categories_name',
        )
        ->join('labels', 'activities.labels_id', '=', 'labels.id')
        ->join('courses', 'activities.courses_id', '=', 'courses.id')
        ->join('categories', 'activities.categories_id', '=', 'categories.id')
        ->join('users_courses','courses.id', '=', 'users_courses.courses_id')
        ->where('users_courses.users_id', $id)
        ->where('activities.status_activities_id', 1)
        ->where('activities.name', 'LIKE', '%' . $request->name . '%')
        ->get();
        
        foreach ($activities as $activity) {
            $activity->image = "http://localhost/calenderbackend/public/imgs/".$activity->image;
        }

        $activities->transform(function($activity) {
            $activity->date = Carbon::parse($activity->date)->format('F j, Y');
            $activity->hour = Carbon::parse($activity->hour)->format('h:i A'); 
            return $activity;
        });

        return $activities;
    }


    public function user_Course($id)
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
        ->join('users_courses','courses.id', '=', 'users_courses.courses_id')
        ->where('users_courses.users_id', $id)
        ->get();
        
        foreach ($activities as $activity) {
            $activity->image = "http://localhost/calenderbackend/public/imgs/".$activity->image;
        }

        $activities->transform(function($activity) {
            $activity->date = Carbon::parse($activity->date)->format('F j, Y');
            $activity->hour = Carbon::parse($activity->hour)->format('h:i A'); 
            return $activity;
        });

        return $activities;
    }

    public function percentagePendingTasks()
    {
        $totalTasks = Activity::count();
        $pendingTasks = Activity::where('status_activities_id', 1)->count();

        $percentagePending = $totalTasks > 0 ? ($pendingTasks / $totalTasks) * 100 : 0;

        return response()->json(['percentage' => $percentagePending]);
    }



}
