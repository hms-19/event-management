<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(Request $request){
        $announcements = Announcement::orderBy("created_at","desc")->paginate(10);

        if($request->name){
            $announcements =Announcement::where("category","like","%".$request->name."%")->orderBy("created_at","desc")->paginate(10);
        }

        return view('frontend.announcement',compact('announcements'));

    }

    public function show($id){
        $announcement = Announcement::find($id);
        return view('frontend.announcement-detail',compact('announcement'));
    }
}
