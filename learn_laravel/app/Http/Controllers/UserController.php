<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UserController extends Controller
{
    public function login_form()
    {
        if(Session::has('token')){
            return redirect('/dashboard')->with('success' , 'Anda sudah Login');
        };
        return view('login');   
    }

    public function login_action(request $request)
    {
        // $hashed_password = Hash()
        if(Session::has('token')){
            return redirect('/dashboard')->with('success' , 'Anda berhasil Login');
        };
        
        $user = User::where('username', $request->username)->first();
        if($user == null){
            return redirect()->back()->with('error' , 'Salah Username atau Password');
        }
        $db_password = $user->password;
        $hashed_password = Hash::check($request->password , $db_password);
        
        if($hashed_password){
            $user->token = Str::random(20);
            $user->save();
            $request->session()->put('token' , $user->token);
            return to_route('dashboard_index')->with('success' , 'Anda berhasil Login');
        }else{  
            return redirect()->back()->with('error' , 'Salah Username atau Password');
        }

    }

    public function dashboard_index()
    {
        if(Session::has('token')){
            $user = User::where('token' , Session::get('token'))->first();
            $articles = Articles::get();
            return view('dashboard/index' , [
                'title' => 'Dashboard Admin',
                'user_token' => $user,
                'data' => $articles,
            ])->with('success' , 'Anda berhasil Login');
        }else{
            return redirect()->back()->with('error' , 'Anda Belum Login');
        }
    }

    public function dashboard_logout(Request $request)
    {
        User::where('token' , $request->token)->update([
            'token' => NULL
        ]);
        Session::pull('token');

        return to_route('login_form')->with('success' , 'Anda berhasil Logout');
    }

    public function article_delete_action(Request $request)
    {
        Articles::find($request->id)->delete();
        return redirect()->back()->with('success' , 'Data berhasil dihapus');
    }

    public function article_add_action(Request $request)
    {
        $request->validate([
            'title' => ['required' , 'max:20'],
            'description' => ['required'],
            'tag' => ['nullable'],
        ]);

        $create = Articles::create([
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tag,
        ]);

        if($create){
            return redirect('/dashboard')->with('success' , 'Data Berhasil DItambahkan');
        }else{
            return redirect('/dashboard')->with('error' , 'Data gagal DItambahkan');
        }
    }

    public function article_input_action()
    {
        return view('/dashboard/input');
    }

    public function article_edit_action($id)
    {
        $data = Articles::find($id);
        return view('/dashboard/edit' , [
            'id' => $data->id,
            'title' => $data->title,
            'description' => $data->description,
            'tag' => $data->tag,
        ]);
    }

    public function article_update_action(Request $request)
    {
        $request->validate([
            'title' => ['required' , 'max:20'],
            'description' => ['required'],
            'tag' => ['nullable'],
        ]);

        $update = Articles::where('id' , $request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tag,
        ]);

        if($update){
            return redirect('/dashboard')->with('success' , 'Data berhasil di Update');
        }else{
            return redirect('/dashboard')->with('error' , 'Data gagal di update');
        }
        
    }

    public function register_form()
    {
        return view('register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'repassword' => 'required',
        ]);

        if($request->password === $request->repassword){
            $user = User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ]);
            if($user){
                return redirect('/login')->with('success' , 'Register Berhasil');
            }else{
                return redirect('/register')->with('error' , 'Register Gagal');   
            }
        }else{
            return redirect()->back()->with('error' , 'Konfirmasi Password Salah');
        }

    }
}
