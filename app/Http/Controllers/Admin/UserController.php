<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('created_at','DESC')->paginate(10);

        return view("admin.users.index",compact("users"));
    }

    public function create(){
        return view("admin.users.create");
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string'],
            'password' =>'required|min:6',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
        ]);

        return back()->with("success","User Created Successfully !");
    }

    public function edit(User $user){
        return view("admin.users.edit",compact("user"));
    }

    public function update(Request $request,User $user){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'role' => ['required', 'string'],
        ]);

        // dd($request->all());

        $user->name = $request->input('name');        
        $user->email = $request->input('email'); 
        $user->role = $request->input('role');

        $user->save();

        return redirect('/admin/users')->with("success","User Updated Successfully !");
    }

    public function destroy(User $user){
        $user->delete();
        return back()->with('success','User Deleted Successfully!');
    }

}
