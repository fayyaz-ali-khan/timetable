<?php

namespace App\Http\Controllers;

use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timeslot = Timeslot::all();
        return view('admin.periods.index', compact('timeslot'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.periods.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'rank' => 'required|integer',
        ]);

        // Concatenate start and end times
        $time = $request->start_time . '-' . $request->end_time;

        // Create a new TimeSlot instance
        $timeslot = new Timeslot();
        $timeslot->time = $time;
        $timeslot->rank = $request->rank;
        // Add other fields as needed

        // Save the TimeSlot instance
        $timeslot->save();
        session()->flash('message', 'Time Period store  successfully');
        // Redirect back or wherever you want
        return redirect()->route('timeslots.index');
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
        $timeslot = Timeslot::findOrFail($id);
        $timeRange = explode('-', $timeslot->time);

        $start_time = trim($timeRange[0]);
        $end_time = trim($timeRange[1]);

        return view('admin.periods.edit', compact('timeslot', 'start_time', 'end_time'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'rank' => 'required|integer',
        ]);

        // Retrieve the Timeslot instance
        $timeslot = Timeslot::findOrFail($id);

        // Concatenate start and end times
        $time = $request->start_time . '-' . $request->end_time;

        // Update the Timeslot instance with the new data
        $timeslot->time = $time;
        $timeslot->rank = $request->rank;
        // Update other fields as needed

        // Save the updated Timeslot instance
        $timeslot->save();

        // Flash a success message
        session()->flash('message', 'Time Period updated successfully');

        // Redirect back or wherever you want
        return redirect()->route('timeslots.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    { 
        // Find the time slot by ID
        $timeslot = Timeslot::findOrFail($id);

        // Delete the time slot
        $timeslot->delete();

        // Flash a success message
        session()->flash('message', 'Time Period deleted successfully');

        // Redirect back or wherever you want
        return redirect()->route('timeslots.index');
    }
}
