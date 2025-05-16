<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // READ: Get all events
    public function index()
    {
        return Event::all();
    }

    // CREATE: Store new event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        return Event::create($validated);
    }

    // READ: Show single event
    public function show($id)
    {
        return Event::findOrFail($id);
    }

    // UPDATE: Modify an existing event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return $event;
    }

    // DELETE: Remove an event
    public function destroy($id)
    {
        Event::destroy($id);
        return response()->json(['message' => 'Event deleted successfully']);
    }
}
