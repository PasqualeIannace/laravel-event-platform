<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Tag;

class EventController extends Controller
{
    public function validation($data)
    {

        $validated = Validator::make(
            $data,
            [
                // "user_id" => "",
                "name" => "required|min:5|max:50",
                "location" => "required|min:5|max:300",
                "image" => "required|min:5|max:300",
                "date" => "required|min:5|max:10",
                "tickets" => "required|min:1|max:5",
            ]
        )->validate();

        return $validated;
    }

    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.events.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $validati = $request->validated();

        $newEvent = new Event();
        $newEvent->fill($validati);
        $newEvent->save();

        if ($request->tags) {
            $newEvent->tags()->attach($request->tags);
        }

        return redirect()->route("admin.events.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $tags = Tag::all();
        return view('admin.events.edit', compact('event', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = $request->all();

        $dati_validati = $this->validation($data);

        $event->update($dati_validati);

        if ($request->filled("tags")) {
            $data["tags"] = array_filter($data["tags"]) ? $data["tags"] : [];  //Livecoding con Luca
            $event->tags()->sync($data["tags"]);
        }
        return redirect()->route('admin.events.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index');
    }
}
