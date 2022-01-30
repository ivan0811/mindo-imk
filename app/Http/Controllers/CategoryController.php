<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    private $message;

    public function __construct(){
        $this->message = new MessageController;
    }

    public function show(){
        $category = Category::paginate(10);
        $active = "category";
        return view('admin.category.show', compact('category', 'active'));
    }

    public function store(Request $req){
        $validator = Validator::make($req->all(),[
            'name' => 'required|unique:categories'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'toast' => $this->message->toast_danger('Gagal Menambahkan Data Kategori')
            ]);;
        }

        Category::create([
            'name' => $req->name
        ]);

        return redirect()->route('show_category')->with([
            'toast' => $this->message->toast_success('Mengubah Data Kategori Berhasil')
        ]);
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
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'toast' => $this->message->toast_danger('Gagal Mengubah Data Kategori')
            ]);
        }

        $category = Category::findOrFail($id);
        $category->name = $req->name;
        $category->save();

        return redirect()->route('show_category')->with([
            'toast' => $this->message->toast_success('Mengubah Data Kategori Berhasil')
        ]);;
    }

    public function search(Request $req){
        $category = Category::where('name', 'like', '%'.$req->q.'%')->paginate(10);
        $q = $req->q;
        return view('admin.category.show', compact('category', 'q'));
    }

    public function destroy($id){
        Category::findOrFail($id)->delete();
        return redirect()->back()->with([
            'toast' => $this->message->toast_success('Menghapus Kategori Berhasil')
        ]);
    }

}
