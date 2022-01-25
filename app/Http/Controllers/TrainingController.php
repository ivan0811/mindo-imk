<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Training, Category, Trainer};
use Validator, File;

class TrainingController extends Controller
{
    public function show(){
        $training = Training::all();
        return view('admin.training.show', compact('training'));
    }    

    public function create(){
        $category = Category::all();
        $trainer = Trainer::all();
        return view('admin.training.create', compact('category', 'trainer'));
    }

    public function store(Request $req){
        $validator = $validator->make($req->all(),[
            'trainer_id' => 'required',
            'category_id' => 'required|unique:trainers',
            'name' => 'required|unique:trainings',
            'type' => 'required',
            'description' => 'required',
            'cover' => 'required|mimes:jpg,png,jpeg,svg',
            'price' => 'required|numeric'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($req->cover){
            $cover = $req->file('cover')->hashName();
            Storage::disk('public')->put('covers/'.$cover, 'covers');
        }

        Training::create([
            'trainer_id' => $req->trainer_id,
            'category_id' => $req->category_id,
            'name' => $req->name,
            'type' => $req->type,
            'description' => $req->description,
            'cover' => $cover,
            'price' => $req->price
        ]);

        return view('admin.training.create', compact('training'));
    }

    public function edit($id){
        $training = Training::findOrFail($id);
        return view('admin.training.edit', compact('training'));
    }

    public function update(Request $req, $id){
        $validator = $validator->make($req->all(),[
            'trainer_id' => 'required',
            'category_id' => 'required|unique:trainers',
            'name' => 'required|unique:trainings',
            'type' => 'required',
            'description' => 'required',
            'cover' => 'required|mimes:jpg,png,jpeg,svg',
            'price' => 'required|numeric'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }        

        if($req->cover){
            $cover = $req->file('cover')->hashName();
            Storage::disk('public')->delete('covers/'.$cover, 'covers');
            Storage::disk('public')->put('covers/'.$cover, 'covers');
        }

        $training = Training::findOrFail($id);
        $training->traner_id = $req->trainer_id;
        $training->category_id = $req->category_id;
        $training->name = $req->name;
        $training->type = $req->type;
        $training->description = $req->description;        
        $training->cover = $cover;
        $training->price = $req->price;
        $training->save();


        return redirect()->route('training');
    }

    public function destroy($id){
        $training = Training::findOrFail($id)->delete();
        Storage::disk('public')->delete('covers/'.$training->cover, 'covers');
        return redirect()->back();
    }
}
