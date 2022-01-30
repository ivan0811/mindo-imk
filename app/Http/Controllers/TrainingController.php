<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use App\Models\{Training, Category, Trainer};
use Validator, File, Str, Storage;

class TrainingController extends Controller
{
    private $message;

    public function __construct(){
        $this->message = new MessageController;
    }
    
    public function show(){
        $training = Training::with('category')->with('trainer')->paginate(10);                
        return view('admin.training.show', compact('training'));
    }

    public function create(){
        $category = Category::all();
        $trainer = Trainer::all();
        return view('admin.training.create', compact('category', 'trainer'));
    }

    public function store(Request $req){
        $validator = Validator::make($req->all(),[
            'trainer_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|unique:trainings',
            'type' => 'required',
            'description' => 'required',
            'cover' => 'required|mimes:jpg,png,jpeg,svg',
            'price' => 'required|numeric'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'toast' => $this->message->toast_danger('Gagal Menambahkan Data Pelatihan')
            ]);
        }                

        if($req->cover){
            $cover = $req->cover->hashName();            
            Storage::disk('public')->put('covers/'.$cover, File::get($req->cover));
        }

        Training::create([
            'trainer_id' => $req->trainer_id,
            'category_id' => $req->category_id,
            'slug' => Str::slug($req->name),
            'name' => $req->name,
            'type' => $req->type,
            'description' => $req->description,
            'cover' => $cover,
            'price' => $req->price
        ]);

        return redirect()->route('show_training')->with([
            'toast' => $this->message->toast_success('Menambahkan Data Pelatihan Berhasil')
        ]);
    }

    public function edit($id){
        $training = Training::findOrFail($id);
        $category = Category::all();
        $trainer = Trainer::all();
        return view('admin.training.edit', compact('training', 'category', 'trainer'));
    }

    public function update(Request $req, $id){
        $validator = Validator::make($req->all(),[
            'trainer_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|unique:trainings,name,'.$id,
            'type' => 'required',
            'description' => 'required',
            'cover' => 'mimes:jpg,png,jpeg,svg',
            'price' => 'required|numeric'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'toast' => $this->message->toast_danger('Gagal Mengubah Data Pelatihan')
            ]);
        }

        $training = Training::findOrFail($id);

        if($req->cover){
            $cover = $req->cover->hashName();
            Storage::disk('public')->delete('covers/'.$training->cover);
            Storage::disk('public')->put('covers/'.$cover, File::get($req->cover));
            $training->cover = $cover;
        }
        
        $training->trainer_id = $req->trainer_id;
        $training->category_id = $req->category_id;
        $training->name = $req->name;
        $training->type = $req->type;
        $training->description = $req->description;        
        $training->price = $req->price;
        $training->save();


        return redirect()->route('show_training')->with([
            'toast' => $this->message->toast_success('Mengubah Data Pelatihan Berhasil')
        ]);
    }

    public function search(Request $req){
        $training = Training::where('name', 'like', '%'.$req->q.'%')->paginate(10);
        $q = $req->q;
        return view('admin.training.show', compact('training', 'q'));
    }

    public function destroy($id){
        $training = Training::findOrFail($id);
        Storage::disk('public')->delete('covers/'.$training->cover);
        $training->delete();
        return redirect()->back()->with([
            'toast' => $this->message->toast_success('Menghapus Data Pelatihan Berhasil')
        ]);
    }
}
