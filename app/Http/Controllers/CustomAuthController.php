<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function agentlogin(){
        return view("agentlogin");
    }

    public function email(){
        return view("email");
    }

    public function registeragent(Request $request){
        return view("adminregister");
    }


 

    public function registerUser(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:users',
            'password'=>'required',
            'email' => 'required|unique:users'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $res = $user->save();

        if($res){
            return back()->with('success','You have registered successfuly');
        }
        else{
            return back()->with('fail','Something wrong');
        }
    }

    public function loginUser(Request $request){

       
        $request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        
        $user = User::where('name','=',$request->name)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId',$user->id);

              
                return redirect('dashboard');
            }

                else{
                    return back()->with('fail','Password not matches.');
                }
            }

        
        else{
            return back()->with('fail','This username is not valid');
        }
    }
    public function dashboard()
    {
        return "Welcome to the Dashboard";
    }

    public function logUser(Request $request)
    {
        $token = $request->input('g-recaptcha-response');
    
    if(strlen($token) > 0 ){
        return view('login');
     }
    else{
        
$request->validate([
    'g-recaptcha-response' => 'required|captcha'
]);
                
        }
       
    }
    
    public function emailUser(Request $request)
    {

        $request->validate([
            'email'=>'required',
        ]);
        if($request='email')
        {
            return view('email');
        }
        else
        {
            $request->validate([
                'email'=>'required',
            ]);
        }
       
    }
    public function adminUser(Request $request)
    {

        $request->validate([
            'number'=>'required',
        ]);
        if($request='number')
        {
            return view('admin');
        }
        else
        {
            $request->validate([
                'number'=>'required',
            ]);
        }
       
    }
}