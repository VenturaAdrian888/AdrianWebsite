<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class CustomAuthController extends Controller
{
    public function login(){

        return view('auth.login');
    }
    public function registration(){
        return view('auth.registration');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required | email | unique:users',
            'password'=>'required| max:12|min:5',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if($res){
         return redirect()->back()->with('success', 'Successfully Register');   
        }
        else{
            return redirect()->back()->with('failed', 'Failed to Register'); 
        }
        
    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required | email',
            'password'=>'required| max:12|min:5',
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }
            else{
                return redirect()->back()->with('failed', 'Password do not match');
            }
        }
        else{
            return redirect()->back()->with('failed', 'Failed to logged In');
        }
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function sampleLogin(){
        return view('auth.simplelogin');
    }
}
//https://www.youtube.com/watch?v=T9q1uT2BEZI&t=2881s