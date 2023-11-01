<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::orderBy('created_at','DESC')->paginate(10);

        return view("admin.events.index",compact("events"));
    }

    public function create(){
        return view("admin.events.create");
    }

    public function store(Request $request){
        
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'program' => ['required', 'string','max:255'],
            'start_time' => ['required', 'string','max:255'],
            'end_time' => ['required', 'string','max:255'],
        ]);

        $day = [];

        if($request->is_one_time == "0"){
            $day = $request->day;
        }

        Event::create([
            'title' => $request->title,
            'program' => $request->program,
            'date' => date('Y-m-d', strtotime($request->date)),
            'day' => json_encode($day),
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'is_one_time' => $request->is_one_time,
            'charges' => $request->charges ?? 0,
            'location' => $request->location ?? '',
        ]);

        return back()->with("success","Event Created Successfully !");
    }

    public function edit(Event $event){
        return view("admin.events.edit",compact("event"));
    }

    public function update(Request $request,Event $event){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'program' => ['required', 'string','max:255'],
            'start_time' => ['required', 'string','max:255'],
            'end_time' => ['required', 'string','max:255'],
        ]);

        $day = [];

        if($request->is_one_time == "0"){
            $day = $request->day;
        }

        $event->title = $request->input('title');        
        $event->program = $request->input('program'); 
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->is_one_time = $request->input('is_one_time');
        $event->date = $request->input('date');
        $event->day = json_encode($request->input('day'));
        $event->charges = $request->input('charges') ?? 0;
        $event->location = $request->input('location');

        $event->save();

        return redirect('/admin/events')->with("success","Event Updated Successfully !");
    }

    public function destroy(Event $event){
        $event->delete();
        return back()->with('success','Event Deleted Successfully!');
    }
}
