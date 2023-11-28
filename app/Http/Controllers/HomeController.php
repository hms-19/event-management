<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $today = now();
        if(Auth::check()){
            $oneTimeEvents = Event::where('program',Auth::user()->role)
                            ->where('is_one_time',"1")
                            ->whereDate('date', '>', $today)
                            ->orderBy("created_at","desc")
                            ->limit(6)
                            ->get();

            $longTimeEvents = Event::where('program',Auth::user()->role)
                            ->where('is_one_time',"0")
                            ->orderBy("created_at","desc")
                            ->limit(6)
                            ->get();

            if(count($oneTimeEvents) < 3){
                $extra = Event::where('program','all')
                                    ->where('is_one_time',"1")
                                    ->whereDate('date', '>', $today)
                                    ->orderBy("created_at","desc")
                                    ->limit(6)
                                    ->get();

                $longextra = Event::where('program','all')
                                    ->where('is_one_time',"0")
                                    ->orderBy("created_at","desc")
                                    ->limit(6)
                                    ->get();

                $oneTimeEvents = collect($oneTimeEvents);
                $longTimeEvents = collect($longTimeEvents);


                $oneTimeEvents = $oneTimeEvents->merge($extra);
                $longTimeEvents = $longTimeEvents->merge($longextra);
            }
        }
        else{
            $oneTimeEvents = Event::where('program',"all")
                            ->where('is_one_time',"1")
                            ->whereDate('date', '>', $today)
                            ->orderBy("created_at","desc")
                            ->limit(6)
                            ->get();

            $longTimeEvents = Event::where('program',"all")
                            ->where('is_one_time',"0")
                            ->orderBy("created_at","desc")
                            ->limit(6)
                            ->get();
        }

        $announcements = Announcement::orderBy('created_at','desc')->limit(4)->get();

        $randomAnnouncements = Announcement::inRandomOrder()->orderBy('created_at','desc')->limit(12)->get();
        $unreadMessage=DB::table('ch_messages')->where('to_id',auth()->user()->id)->where('seen',false)->count();

        return view("frontend.home",compact("oneTimeEvents","longTimeEvents","announcements","randomAnnouncements","unreadMessage"));
    }
}
