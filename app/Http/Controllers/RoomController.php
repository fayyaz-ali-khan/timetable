<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        // Your dashboard logic goes here
        return view('admin.rooms.index', compact('rooms'));
    }

    public function add()
    {
        return view('admin.rooms.add');
    }

    public function store(Request  $request)
    {

        // Validate the request data
        $request->validate(Room::rules());

        // Create the room
        $room = Room::create([
            'name' => $request->input('name'),
            'capacity' => $request->input('capacity')
        ]);

        // Flash a success message to the session
        session()->flash('message', 'Room created successfully');

        // Redirect back to the page with the success message
        return redirect()->back();
    }

    public function edit($id)
    {
        // Find the room with the given ID
        $room = Room::findOrFail($id);

        // Return the view for editing the room, passing the room data
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request  $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:rooms,name,' . $id,
            'capacity' => 'required|integer|min:1',
        ]);

        // Find the room with the given ID
        $room = Room::findOrFail($id);

        // Update the room with the new data
        $room->update([
            'name' => $request->input('name'),
            'capacity' => $request->input('capacity')
        ]);

        // Flash a success message to the session
        session()->flash('message', 'Room updated successfully');

        // Redirect back to the page
        return redirect()->back();
    }

    public function destroy($id)
    {
        // Find the room with the given ID
        $room = Room::findOrFail($id);

        // Delete the room
        $room->delete();

        // Flash a success message to the session
        session()->flash('message', 'Room deleted successfully');

        // Redirect back to the page with the success message
        return redirect()->back();
    }
}
