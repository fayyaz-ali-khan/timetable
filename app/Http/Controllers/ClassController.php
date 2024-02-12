<?php

namespace App\Http\Controllers;

use App\Models\CollegeClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = CollegeClass::all();
        // Your dashboard logic goes here
        return view('admin.classes.index',compact('classes'));
    }

    public function add()
    {
        
        // Your dashboard logic goes here
        return view('admin.classes.add');
    }

    public function store(Request  $request)
    {

        // Validate the request data
        $request->validate(CollegeClass::rules());
        // Create the class
        $class = CollegeClass::create([
            'name' => $request->input('name'),
            'size' => $request->input('size')
        ]);

        // Flash a success message to the session
        session()->flash('message', 'Class created successfully');

        // Redirect back to the page with the success message
        return redirect()->back();
    }

    public function edit($id)
    {
        $classes = CollegeClass::findOrFail($id);
        // Your dashboard logic goes here
        return view('admin.classes.edit',compact('classes'));
    }

    public function update(Request  $request, $id)
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
