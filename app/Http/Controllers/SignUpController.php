<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Visitor;
use Session;

class SignUpController extends Controller
{
    public function index()
    {
        return view('front.user.sign-up',[
            'categories'                    => Category::where('publication_status',1)->get(),
        ]);
    }
    
    public function newSignUp(Request $request){
        Visitor::saveVisitorInfo($request);
        return redirect('/');
    }
    
    public function visitorLogout(Request $request){
        Session::forget('visitorId');
        Session::forget('visitorName');
        return redirect('/');
    }
    
    public function visitorSignInForm()
    {
        return view('front.user.sign-in',[
           'categories'                     => Category::where('publication_status',1)->get() 
        ]);
    }
    
    public function visitorSignIn(Request $request){
        $visitor = Visitor::where('email_address', $request->email_address)->first();
        if($visitor){
            if(password_verify($request->password, $visitor->password)){
                Session::put('visitorId', $visitor->id);
                Session::put('visitorName', $visitor->first_name.' '.$visitor->last_name);
                return redirect('/');
            }
            else {
                return redirect('/visitor-sign-in-form')
                                        ->with('message', 'Password is not matched');
            }
        }
        else {
            return redirect('/visitor-sign-in-form')
                                        ->with('message', 'Email Address is invalid');
        }
    }
    
    public function emailCheck($email)
    {
        $visitor = Visitor::where('email_address',$email)->first();
//        if($visitor)
//        {
//            echo 'Email Address is not available, try another one';
//        }
//        else {
//            echo 'Email Address is Available';
//        }
        
        if($visitor)
        {
            return json_encode('Email Address is not available, try another one');
        }
        else {
            return json_encode('Email Address is Available') ;
        }
    }
    
    }
 
