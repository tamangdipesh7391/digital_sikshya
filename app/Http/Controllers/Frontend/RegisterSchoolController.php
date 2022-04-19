<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;

class RegisterSchoolController extends Controller
{
    
    public function index()
    {
        
    }

    
    public function create(Request $request)
    {
        if($request->isMethod('get')){

            return view('Frontend.pages.register-school.add');
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

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
