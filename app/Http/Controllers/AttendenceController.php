<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use Illuminate\Http\Request;
use App\Models\WorkerAbsence;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.attendence.index', [
            'attendences' => Attendence::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.attendence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:attendences'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Attendence::create($validatedData);

        return redirect('/dashboard/attendences')->with('success', 'New Attendence created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function show(Attendence $attendence)
    {
        return view('dashboard.attendence.show', [
            'attendence' => $attendence,
            'absences' => WorkerAbsence::where('attendence_id', $attendence->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendence $attendence)
    {
        return view('dashboard.attendence.edit', [
            'attendence' => $attendence
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendence $attendence)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:attendences'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Attendence::where('id', $attendence->id)->update($validatedData);

        return redirect('/dashboard/attendences')->with('success', 'Attendence updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendence $attendence)
    {
        Attendence::destroy($attendence->id);
        return redirect('/dashboard/attendences')->with('success', 'Attendence deleted successfully');
    }
}
