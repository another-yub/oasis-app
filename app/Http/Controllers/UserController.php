<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;

class UserController extends Controller
{
    public function index(){
        $alluser = User::latest()->paginate(4);
        return view('app.user.index', compact('alluser'));
    }

    public function create(){
        return view('app.user.create');
    }

    public function store(Request $request){
         try {
            User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'nama_lengkap' => $request->nama_lengkap,
            ]);

            return redirect()->route('user.index')->with(['success' => 'Data berhasil di tambahkan :)']);
         } catch (\Throwable $th) {
            return redirect()->route('user.index')->with(['error' => 'Data gagal di tambahkan :(']);
         }
    }

    public function edit($id){
        $user = User::where('id', $id)->first();
        if ($user == null) {
            return redirect()->route('user.index')->with(['error' => 'Data gagal di temukan :(']);
        }
        return view('app.user.edit', compact('user'));
    }

    public function update(Request $request){
        try {
            $user = User::where('id', $request->id)->first();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->nama_lengkap = $request->nama_lengkap;

            if ($request->password == null) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return redirect()->route('user.index')->with(['success' => 'Data berhasil di ubah :)']);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('user.index')->with(['error' => 'Data gagal di ubah']);
        }
    }

    public function delete($id){
        try {
            $user = User::where('id', $id)->first();
            $user->delete();

            return redirect()->route('user.index')->with(['success' => 'Data berhasil di hapus :)']);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('user.index')->with(['error' => 'Data gagal di simpan']);
        }
    }
}
