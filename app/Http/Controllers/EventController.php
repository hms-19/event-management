<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $data = Event::where('program',"all")
                            ->orderBy("created_at","desc")
                            ->limit(6)
                            ->get();

        $events = [];

        foreach ($data as $event) {
            $events[] = [
                'title' => $event->title,
                'start' => $event->start_time,
                'end' => $event->end_time,
            ];
        }

        // dd($events);
        return view("frontend.event",compact("events"));
    }
}
