<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        // Your dashboard logic goes here
        return view('admin.courses.index', compact('courses'));
    }

    public function add()
    {
        return view('admin.courses.add');
    }

    public function store(Request  $request)
    {
        // Validate the request data
        $request->validate(Course::rules());

        // Create the course
        $course = Course::create([
            'course_code' => $request->input('course_code'),
            'name' => $request->input('name')
        ]);

        // Flash a success message to the session
        session()->flash('message', 'Cource created successfully');

        // Redirect back to the page with the success message
        return redirect()->back();
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);

        // Return the view for editing the room, passing the room data
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request  $request, $id)
    {
        $request->validate([
            'course_code' => 'required|unique:courses,course_code,'.$id,
            'name' => 'required|unique:courses,name,'.$id
        ]);
        // Find the room with the given ID
        $course = Course::findOrFail($id);
        // Create the course
        $course->update([
            'course_code' => $request->input('course_code'),
            'name' => $request->input('name')
        ]);

        // Flash a success message to the session
        session()->flash('message', 'Cource Update successfully');

        // Redirect back to the page with the success message
        return redirect()->back();
    }

    public function destroy($id)
    {
        // Find the course with the given ID
        $course = Course::findOrFail($id);

        // Delete the course
        $course->delete();

        // Flash a success message to the session
        session()->flash('message', 'Course deleted successfully');

        // Redirect back to the page with the success message
        return redirect()->back();
    }
}
