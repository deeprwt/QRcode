<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:confirmPassword',
            'confirmPassword'=>'required'
    
           ]);
           if($validator->fails()){
               return back()->withInput()->withErrors($validator);
           }
           if($request->password != $request->confirmPassword){
               return back()->with('error','passowrd does not match');
           }
           $data = array(
               'name'=>$request->name,
               'email'=>$request->email,
               'password'=>Hash::make($request->password)  
           );
           if(User::create($data)){
               return redirect('/')->with('success','Registraion Completed');
           }
           return back()->with('error','something went wrong');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
           
           ]);
           if($validator->fails()){
               return back()->withInput()->withErrors($validator);
           }
        $remember_me = $request->has('remember_me') ? true : false;
    
        $check = $request->only('email', 'password');
        
        if(Auth::guard('admin')->attempt($check, $remember_me))
        {
            return redirect('admin/home');
        }
        return back()->with('error','credientials not found');
    }
    public function logout(Request $request)        
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
  
}
