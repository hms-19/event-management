<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'content' => 'required'
        ]);
        
        Comment::create([
            'user_id' => auth()->user()->id,
            'announcement_id' => $request->announcement_id,
            'content' => $request->content,
        ]);

        return redirect(route('announcement.detail', [$request->announcement_id]). '#comment')->with('success','Commented !');
    }
}
