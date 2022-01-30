<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Training, Category, Trainer, User};

class IndexController extends Controller
{
    public function show(){
        $data = Training::with('category')->with('trainer')->get();
        $program_terbaru = $data->sortByDesc('id')->take(3); 
        $program_unggulan = $data->shuffle()->take(5);
        $category = Category::all();        
        return view('index', compact('program_terbaru', 'program_unggulan', 'category'));
    }

    public function showByCategory(Request $req){                
        $program_terbaru = Training::with('category')->with('trainer')->get()->sortByDesc('id')->skip(0)->take(3);                 
        $program_unggulan = Training::with('category')
        ->with('trainer')
        ->whereHas('category', function($query) use ($req){
            return $query->where('name', $req->nama);
        })->get()
        ->shuffle()
        ->skip(0)
        ->take(6);        

        $category = Category::all();
        return view('index', compact('program_terbaru', 'program_unggulan', 'category'));
    }

    public function showTraining(){
        $program = Training::with('category')->with('trainer')->get();
        $category = Category::all();
        return view('participant.training', compact('program', 'category'));
    }

    public function showTrainingByCategory(Request $req){
        $program = Training::with('category')
        ->with('trainer')
        ->whereHas('category', function($query) use ($req){
            return $query->where('name', $req->nama);
        })->get();
        $category = Category::all();
        return view('participant.training', compact('program', 'category'));
    }

    public function showTrainingDetail($slugCategory, $slugTraining){
        $training = Training::with('category')
        ->with('trainer')        
        ->where('slug', $slugTraining)        
        ->whereHas('category', function($query) use ($slugCategory){
            return $query->where('slug', $slugCategory);
        })->first();
        // echo $training;
        $no_wa = User::where('role', 'admin')->get();
        $no_wa = $no_wa->random()->no_wa;
        return view('participant.detail', compact('training', 'no_wa'));
    }    

    public function searchTraining(Request $req){
        $program = Training::where('name', 'LIKE', '%'.$req->q.'%')->with('category')->with('trainer')->get();
        $category = Category::all();
        return view('participant.training', compact('program', 'category'));
    }

    // public function showTentangKami(){

    // }
}
