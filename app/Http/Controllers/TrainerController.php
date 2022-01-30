<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use App\Models\Trainer;
use Validator;

class TrainerController extends Controller
{
    private $message;

    public function __construct(){
        $this->message = new MessageController;
    }

    public function show(){
        $trainer = Trainer::paginate(10);
        $active = "trainer";
        return view('admin.trainer.show', compact('trainer', 'active'));
    }

    public function store(Request $req){
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'email' => 'required|unique:trainers',
            'no_wa' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'toast' => $this->message->toast_danger('Gagal Menambahkan Data Pengajar')
            ]);
        }

        Trainer::create([
            'name' => $req->name,
            'email' => $req->email,
            'no_wa' => $req->no_wa
        ]);

        return redirect()->route('show_trainer')->with([
            'toast' => $this->message->toast_success('Menambahkan Data Pengajar Berhasil')
        ]);
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
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'toast' => $this->message->toast_danger('Gagal Mengubah Data Pengajar')
            ]);
        }

        $trainer = Trainer::findOrFail($id);
        $trainer->name = $req->name;
        $trainer->email = $req->email;
        $trainer->no_wa = $req->no_wa;
        $trainer->save();


        return redirect()->route('show_trainer')->with([
            'toast' => $this->message->toast_success('Mengubah Data Pengajar Berhasil')
        ]);;
    }

    public function search(Request $req){
        $trainer = Trainer::where('name', 'like', '%'.$req->q.'%')->paginate(10);
        $q = $req->q;
        return view('admin.trainer.show', compact('trainer', 'q'));
    }

    public function destroy($id){
        Trainer::findOrFail($id)->delete();
        return redirect()->back()->with([
            'toast' => $this->message->toast_success('Berhasil Menghapus Data Pengajar')
        ]);
    }
}
