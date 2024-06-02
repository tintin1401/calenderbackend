<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal_information;

class Personal_informationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $personal_information = Personal_information::select(
            'personal_informations.gender',
            'personal_informations.physical_activity',
            'personal_informations.sleep_hours',
            'personal_informations.diseases',
            'users.name as users_name'
        )
        ->join('users', 'personal_informations.users_id', '=', 'users.id')
        ->get();
        return $personal_information;
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
