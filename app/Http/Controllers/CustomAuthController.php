<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;


class CustomAuthController extends Controller
{
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

                $pin = mt_rand(1000000, 9999999);
                $user->verification_code = $pin;
                $user->save();

                Mail::to($user->email)->send(new OtpMail($pin));

                return redirect('email');

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

   
    public function emailUser(Request $request)
    {

        $userId = $request->session()->get('loginId');

        $user = User::where('id','=', $userId)->first();

        
        if($user->verification_code == $request->number){

            $user->verification_code = null;
            $user->update();
            if($user->admin == 1) {
                return redirect('admindashboard');
            }
            else {
                return redirect('dashboard');
            }
            
        }
       
        else{
            return back()->with('fail','The pin is incorrect');
           
        }
           
           
    }
    public function adminUser(Request $request)
    {
        $token = $request->input('g-recaptcha-response');
    
    if(strlen($token) > 0 ){
        return view('agentlogin');
     }
    else{
        
    $request->validate([
        'g-recaptcha-response' => 'required|captcha'
    ]);
                
        }
       
    }

    public function adminLogin(Request $request){

       
        $request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        
        $user = User::where('name','=',$request->name)->first();
        if($user->admin == 1){
            if($request->password == $user->password){
                $request->session()->put('loginId',$user->id);

                $pin = mt_rand(1000000, 9999999);
                $user->verification_code = $pin;
                $user->save();

                Mail::to($user->email)->send(new OtpMail($pin));

                return redirect('email');

            }

                else{
                    return back()->with('fail','Password not matches.');
                }
            }

        
        else{
            return back()->with('fail','This username is not valid');
        }
    }
}