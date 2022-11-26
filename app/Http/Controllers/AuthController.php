<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Session;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function index(Request $request)
    {     
          
    }

    public function front_logout(Request $request){
 
        Session::flush();
        Auth::logout();  

        Session::flash('flash_message', 'Logout successfully.');
        Session::flash('flash_type', 'alert-success'); 

        return redirect()->back();
    }

    public function login(Request $request)
    {      
        return view('auth.login');  
    }
    public function register(Request $request)
    {      
        return view('auth.register');  
    }
    public function register_submit(Request $request)
    {   
        $this->validate($request, [
            'name' => 'required', 
            'email' => 'required|unique:users,email',
            'phone_no' => 'required|digits:10',  // required|same:confirm-password
            'password' =>'required|same:confirm_password',

        ]);


        
        $input = $request->all(); 

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input); 
         
        return redirect()->route('login')->with('success','User registered successfully');

    }

    public function login_submit(Request $request)
    {   
        $input = $request->all();
       
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]); 

        $credentials = $request->only('email', 'password');
             
        if(auth()->attempt($credentials)) 
        { 
            return redirect()->route('event_list');
            
        }else{   
            Session::flash('flash_message', 'Invalid Credential.');
            Session::flash('flash_type', 'alert-danger');  
            return redirect()->route('login')->with('error','Invalid Credential');
        }   
    }
}
