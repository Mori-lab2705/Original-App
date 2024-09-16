<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(Request $request,)
    {
        $events = Event::all();
        
        if ($request->ajax()) {
            $data = DB::table('events')->select('title', 'person', 'progress', 'importance', 'start', 'end', 'memo', 'textColor')->get();
            return response()->json($data);
        }
        return view('event', compact('events'));
    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->title = $request->input('title');
        $event->person = $request->input('person');
        $event->progress = $request->input('progress');
        $event->importance =$request->input('importance');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->memo = $request->input('memo');
        $event->textColor = $request->input('textColor');
        $event->save();
        return redirect('/event');
    }

    public function show()
    {
        $events = Event::all();
        return view('event', compact('events'));
    }

    public function edit(Event $event)
    {
        return view('edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $event->title = $request->input('title');
        $event->person = $request->input('person');
        $event->progress = $request->input('progress');
        $event->importance = $request->input('importance');
        $event->memo = $request->input('memo');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->update();

        return redirect('/event');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return back();

    }


}
