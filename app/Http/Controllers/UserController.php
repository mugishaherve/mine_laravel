<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = Users::all();

        return view('users.index', ['users' => $users]);
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $newUser = Users::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully');
        
    }    //
    public function edit(Users $users){
        
        return view('users.edit', ['users' => $users]);
    }

    public function update(Users $users, Request $request){

        $data = $request->validate([
            
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $users->update($data);

        return redirect(route('users.index'))->with('success', 'user updated successfully');

        

        
        
    }

    public function destroy(Users $users){
        $users->delete();

        return redirect(route('users.index'))->with('success', 'user was deleted successfully');
    }
}