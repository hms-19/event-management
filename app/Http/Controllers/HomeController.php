<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
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

            if(count($oneTimeEvents) < 3){
                $extra = Event::where('program','all')
                                    ->where('is_one_time',"1")
                                    ->whereDate('date', '>', $today)
                                    ->orderBy("created_at","desc")
                                    ->limit(6)
                                    ->get();

                $oneTimeEvents = collect($oneTimeEvents);

                $oneTimeEvents = $oneTimeEvents->merge($extra);
            }
        }
        else{
            $oneTimeEvents = Event::where('program',"all")
                            ->where('is_one_time',"1")
                            ->whereDate('date', '>', $today)
                            ->orderBy("created_at","desc")
                            ->limit(6)
                            ->get();
        }

        return view("frontend.home",compact("oneTimeEvents"));
    }
}
