<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    public function show(){
        $category = Category::all();
        return view('admin.category.show', compact('category'));
    }    

    public function store(Request $req){
        $validator = $validator->make($req->all(),[
            'name' => 'required|unique:categories'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Category::create([
            'name' => $req->name
        ]);

        return view('admin.category.create', compact('category'));
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $req, $id){
        $validator = Validator::make($req->all(), [
            'name' => 'required|unique:categories,name,'.$id
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category = Category::findOrFail($id);
        $category->name = $req->name;
        $category->save();


        return redirect()->route('category');
    }

    public function destroy($id){
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }
    
}
