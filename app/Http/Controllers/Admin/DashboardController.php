<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
        $total_user = User::count();
        $total_admin = User::where('role','admin')->count();
        $total_pre_foundation_user = User::where('role','pre-foundation')->count();
        $total_foundation_user = User::where('role','foundation')->count();
        $total_hd_bachelor_user = User::where('role','hd-bachelor')->count();
        $total_announcement = Announcement::count();

        $one_time_events = Event::whereDate('date', '>=' ,Carbon::today())->orderBy('created_at','DESC')->paginate(10);
        $long_time_events = Event::where('is_one_time',0)->orderBy('created_at','DESC')->paginate(10);
        // dd($one_time_events);
        return view("admin.dashboard",compact("total_user","total_admin","total_pre_foundation_user","total_foundation_user","total_hd_bachelor_user","total_announcement","one_time_events","long_time_events"));
    }
}
