<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use App\Models\{User, ParticipantTraining, Training};
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $message;

    public function __construct(){
        $this->message = new MessageController;
    }
    
    public function show(){
        $user = User::paginate(10);        
        return view('admin.user.show', compact('user'));
    }

    public function create(){
        $training = Training::all();
        return view('admin.user.create', compact('training'));
    }

    public function store(Request $req){          
        $rule = [];                      
        if($req->role == 'peserta'){
            $rule = [
                'training_id' => 'required'                
            ];
        }

        $rule = array_merge([            
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',            
            'password' => 'required|confirmed|min:8',
            'no_wa' => 'required'
        ], $rule);

        $validator = Validator::make($req->all(),$rule);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'toast' => $this->message->toast_danger('Gagal Mengubah Data Pengguna')
            ]);
        }

        $user = User::create([
            'name' => $req->name,
            'username' => $req->username,
            'email' => $req->email,
            'role' => $req->role,
            'no_wa' => $req->no_wa,
            'password' => Hash::make($req->password)
        ]);        

        if($req->role == 'peserta'){
            foreach ($req->training_id as $value) {
                ParticipantTraining::create([
                    'user_id' => $user->id,
                    'training_id' => $value
                ]);
            }        
        }        

        return redirect()->route('show_user')->with([
            'toast' => $this->message->toast_success('Mengubah Data Pengguna Berhasil')
        ]);
    }

    public function edit($id){
        $user = User::where('id', $id)->with('participantTraining')->get()[0];
        $training = Training::all();
        return view('admin.user.edit', compact('user', 'training'));
    }

    public function update(Request $req, $id){        
        $rule = [];
        if($req->role == 'peserta'){
            $rule = [
                'training_id' => 'required'    
            ];
        }

        $rule = array_merge([            
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'email' => 'required|unique:users,email,'.$id,            
            'password' => 'confirmed',
            'no_wa' => 'required'
        ], $rule);

        $validator = Validator::make($req->all(),$rule);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput()->with([
                'toast' => $this->message->toast_danger('Gagal Mengubah Data Pengguna')
            ]);
        }

        $user = User::findOrFail($id);
        $user->name = $req->name;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->no_wa = $req->no_wa;
        $user->role = $req->role;
        if ($req->password) {
            $user->password = $req->password;
        }        
        $user->save();
                
        ParticipantTraining::where('user_id', $id)->delete();                    

        if($req->role == 'peserta'){
            foreach ($req->training_id as $value) {
                ParticipantTraining::create([
                    'user_id' => $id,
                    'training_id' => $value
                ]);
            }            
        }        

        return redirect()->route('show_user')->with([
            'toast' => $this->message->toast_success('Mengubah Data Pengguna Berhasil')
        ]);
    }

    public function search(Request $req){
        $user = User::where('name', 'like', '%'.$req->q.'%')->paginate(10);
        $q = $req->q;
        return view('admin.user.search', compact('user', 'q'));
    }

    public function destroy($id){
        User::findOrFail($id)->delete();
        return redirect()->back()->with([
            'toast' => $this->message->toast_success('Menghapus Data Pengguna Berhasil')
        ]);
    }
}
