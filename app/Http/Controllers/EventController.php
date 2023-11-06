<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(){
       
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                $data = Event::where('is_one_time',1)->get();
            }   
            else{
                $data = Event::where('is_one_time',1)->whereIn('program',[Auth::user()->role,'all'])->get();
            }
        }
        else{
            $data = Event::where('is_one_time',1)->where('program','all')->get();
        }

        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                $longTimeEvents = Event::where('is_one_time',0)->paginate(10);
            }   
            else{
                $longTimeEvents = Event::where('is_one_time',0)->whereIn('program',[Auth::user()->role,'all'])->paginate(10);
            }
        }
        else{
            $longTimeEvents = Event::where('is_one_time',0)->where('program','all')->paginate(10);
        }

        $events = $data->map(function($event){
            return [
                'title' => $event->title,
                'start' => date('Y-m-d H:i:s', strtotime("$event->date $event->start_time")),
                'end' =>date('Y-m-d H:i:s', strtotime("$event->date $event->start_time")),
                'url' => "/events/$event->id"
            ];
        });
        
        return view("frontend.event",compact("events","longTimeEvents"));
    }

    public function register(Request $request){
        $event = Event::find($request->id);
        return view('frontend.event-register',compact("event"));
    }

    public function submitEvent(Request $request){

        $user = Auth::user();
        $event = Event::find($request->id);

        $userevent = EventUser::where('user_id',$user->id)->where('event_id',$event->id)->get();

        if(count($userevent) > 0){
            return back()->with("sorry","You have already joined !");
        }

        $event->users()->attach($user, ['status' => 'pending']);

        return back()->with("success","Event registered successfully !");
    }

}
