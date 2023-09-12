<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use Illuminate\Http\Request;
use App\Models\WorkerAbsence;

class Absence extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.WorkerAbsence.index', [
            'absences' => WorkerAbsence::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.WorkerAbsence.create', [
            'attendences' => Attendence::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'attendence_id' => 'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;

        WorkerAbsence::create($validateData);

        return redirect('/dashboard/absences')->with('success', 'Absence Susses!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkerAbsence  $workerAbsence
     * @return \Illuminate\Http\Response
     */
    public function show(WorkerAbsence $workerAbsence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkerAbsence  $workerAbsence
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkerAbsence $workerAbsence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkerAbsence  $workerAbsence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkerAbsence $workerAbsence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkerAbsence  $workerAbsence
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkerAbsence $workerAbsence)
    {
        WorkerAbsence::destroy($workerAbsence->id);
        return redirect('/dashboard/absences')->with('success', 'Absence deleted Susses!');
    }
}
