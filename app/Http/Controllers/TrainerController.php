<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use Validator;

class TrainerController extends Controller
{
    public function show(){
        $trainer = Trainer::all();
        $active = "trainer";
        return view('admin.trainer.show', compact('trainer', 'active'));
    }

    public function store(Request $req){
        $validator = $validator->make($req->all(),[
            'name' => 'required',
            'email' => 'required|unique:trainers',
            'no_wa' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Trainer::create([
            'name' => $req->name,
            'email' => $req->email,
            'no_wa' => $req->no_wa
        ]);

        return view('admin.trainer.create', compact('trainer'));
    }

    public function edit($id){
        $trainer = Trainer::findOrFail($id);
        return view('admin.trainer.edit', compact('trainer'));
    }

    public function update(Request $req, $id){
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|unique:trainers,email,'.$id,
            'no_wa' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $trainer = Trainer::findOrFail($id);
        $trainer->name = $req->name;
        $trainer->email = $req->email;
        $trainer->no_wa = $req->no_wa;
        $trainer->save();


        return redirect()->route('trainer');
    }

    public function destroy($id){
        Trainer::findOrFail($id)->delete();
        return redirect()->back();
    }
}
