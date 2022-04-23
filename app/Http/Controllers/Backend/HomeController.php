<?php

namespace App\Http\Controllers\backend;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\School;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request){
        if(Session::has('loginStatus')){
            return view('Backend.home');
        }
        if($request->isMethod('get')){
            return view('Backend.login');

        }
        if($request->isMethod('post')){
            $request->validate([
                'username' => 'required',
                'password' => 'required'

            ]);
            $username = $request->username;
            $password = md5($request->password);
            $res = User::where('email','=',$username)->where('password','=',$password)->get();
            if($res->count()>0){
               Session::put('loginStatus',TRUE);
               return view('Backend.home');
            }
            return redirect()->back()->with('error','Username or password not matched!');


        }
    }


    public function register(Request $request)
    {
        if($request->isMethod('get')){

            return view('Backend.register');
        }
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required|min:10',
                'email' => 'required|unique:schools,email',
                'phone' => 'required',
                'district' => 'required',
                'city' => 'required',
                'street' => 'required',
                'short_code' => 'required|unique:schools,short_code',
                'principle' => 'required',
                'password' => 'required|confirmed|min:6',


            ]);

            $register_college_data = $request->all();
            School::create($register_college_data);
            $details = [
                'title' => 'Mail from ItSolutionStuff.com',
                'body' => 'This is for testing email using smtp'
            ];
            
            Mail::to('tamangdipesh7391@gmail.com')->send(new \App\Mail\CollegeRegistrationMail($details));

           
            dd("Email is Sent.");
            return redirect()->back()->with('success','Your request has been sent successfully, please check you inbox to verify registration !');
        }
    }

    // public function register(Request $request){
    //     if(Session::has('loginStatus')){
    //         return view('Backend.home');
    //     }
    //     if($request->isMethod('get')){
    //         return view('Backend.register');
    //     }
    //     if($request->isMethod('post')){
    //         $request->validate([
    //             'name' => 'required|min:3',
    //             'email' => 'required|unique:users,email',
    //             'password' => 'required| min:4|confirmed',
    //             'password_confirmation' => 'required| min:4'
    //         ]);
    //         $userData = new User();
    //         $userData->name = $request->name;
    //         $userData->email = $request->email;
    //         $userData->password = md5($request->password);
    //         $userData->save();
    //         return redirect()->route('admin-home')->with('success','Your account has been created successfully, 
    //         please proceed to login.');
    //     }
    // }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('admin-panel');
    }

}
