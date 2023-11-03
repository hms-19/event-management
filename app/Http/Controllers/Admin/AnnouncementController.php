<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function index(){
        $announcements = Announcement::orderBy('created_at','DESC')->paginate(10);

        return view("admin.announcements.index",compact("announcements"));
    }

    public function create(){
        return view("admin.announcements.create");
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'category' => ['required', 'string'],
            'image' => ['required','image','mimes:jpeg,png,jpg,webp','max:4080'],
        ]);


        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
        }

        Announcement::create([
            'title' => $request['title'],
            'image' => 'images/' . $filename,
            'content' => $request['content'],
            'category' => $request['category'],
        ]);

        return back()->with("success","Announcement Created Successfully !");
    }

    public function edit(Announcement $announcement){
        return view("admin.announcements.edit",compact("announcement"));
    }

    public function update(Request $request,Announcement $announcement){
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'category' => ['required', 'string'],
        ]);

        $oldFileName = $announcement->image;

        $announcement->title = $request->input('title');        
        $announcement->content = $request->input('content'); 
        $announcement->category = $request->input('category');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $filename);
    
            $announcement->image = 'images/' . $filename;
            
            if ($oldFileName) {
                Storage::delete(public_path(''.$oldFileName));
            }
        }

        $announcement->save();

        return redirect('/admin/announcements')->with("success","Announcement Updated Successfully !");
    }

    public function destroy(Announcement $announcement){
        $announcement->delete();
        return back()->with('success','Announcement Deleted Successfully!');
    }
}
