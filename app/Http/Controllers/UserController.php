<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, ParticipantTraining, Training};
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(){
        $user = User::all();
        $active = "user";
        return view('admin.user.show', compact('user', 'active'));
    }

    public function create(){
        $training = Training::all();
        return view('admin.user.create', compact('training'));
    }

    public function store(Request $req){
        $validator = Validator::make($req->all(),[
            'training_id' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:trainers',
            'no_wa' => 'required',
            'password' => 'required|confirmed|min:8'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $req->name,
            'username' => $req->username,
            'email' => $req->email,
            'no_wa' => $req->no_wa,
            'password' => Hash::make($req->password)
        ]);

        ParticipantTraining::create([
            'user_id' => $req->user_id,
            'training_id' => $req->training_id
        ]);

        return view('admin.user.create', compact('user'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $training = Training::all();
        return view('admin.user.edit', compact('user', 'training'));
    }

    public function update(Request $req, $id){
        $validator = $validator->make($req->all(),[
            'training_id' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:trainers',
            'no_wa' => 'required',
            'password' => 'required|confirmed'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->name = $req->name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->no_wa = $req->no_wa;
        $user->password = $req->password;
        $user->save();

        ParticipantTraining::where('user_id', $id)
        ->where('training_id', $req->old_training_id)
        ->update([
            'training_id' => $req->training_id
        ]);

        ParticipantTraining::create([
            'user_id' => $req->user_id,
            'training_id' => $req->training_id
        ]);


        return redirect()->route('user');
    }

    public function destroy($id){
        User::findOrFail($id)->delete();
        return redirect()->back();
    }
}
