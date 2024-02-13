<?php

namespace App\Http\Controllers;

use App\Models\AcademicPeriod;
use App\Models\ClassCourse;
use App\Models\CollegeClass;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\UnavailableRoom;

use App\Models\Room;

class ClassController extends Controller
{
    public function index()
    {
        $classes = CollegeClass::all();
        // Your dashboard logic goes here
        return view('admin.classes.index', compact('classes'));
    }

    public function add()
    {

        $rooms = '';
        // Your dashboard logic goes here
        $courses = Course::all();
        $academic_periods = AcademicPeriod::all();
        $unavalible_rooms = UnavailableRoom::select('room_id')->get();
        if ($unavalible_rooms->count() > 0) {
            $rooms = Room::whereNotIn('id', $unavalible_rooms)->get();
        } else {
            $rooms = Room::all();
        }
        return view('admin.classes.add', compact('courses', 'academic_periods', 'rooms'));
    }

    public function store(Request $request)
    {
        // dd($request->room_id);
        // Validate the request data
        $request->validate(CollegeClass::rules());
        // Create the class
        $class = CollegeClass::create([
            'name' => $request->input('name'),
            'size' => $request->input('size')
        ]);

        ClassCourse::create(['class_id' => $class->id, 'academic_period_id' => $request->academic_period_id, 'course_id' => $request->course_id, 'meetings' => '11']);
        UnavailableRoom::create(['class_id' => $class->id, 'room_id' => $request->room_id]);

        // Flash a success message to the session
        session()->flash('message', 'Class created successfully');

        // Redirect back to the page with the success message
        return redirect()->back();
    }

    public function edit($id)
    {
        $classes = CollegeClass::findOrFail($id);
        // Your dashboard logic goes here
        return view('admin.classes.edit', compact('classes'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:rooms,name,' . $id,
            'size' => 'required|integer|min:1',
        ]);

        // Find the room with the given ID
        $room = CollegeClass::findOrFail($id);

        // Update the room with the new data
        $room->update([
            'name' => $request->input('name'),
            'size' => $request->input('size')
        ]);

        // Flash a success message to the session
        session()->flash('message', 'Class updated successfully');

        // Redirect back to the page
        return redirect()->back();
    }

    public function destroy($id)
    {
        // Find the class with the given ID
        $class = CollegeClass::findOrFail($id);

        // Delete the class
        $class->delete();

        // Flash a success message to the session
        session()->flash('message', 'Class deleted successfully');

        // Redirect back to the page with the success message
        return redirect()->back();
    }

}
