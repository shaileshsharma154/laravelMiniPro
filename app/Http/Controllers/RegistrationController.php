<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
        return view('form');
    }

    public function fetchData(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'pwd' => 'required'
        ]
    );
        
         print_r($request->all());
        //echo "dasd";

    }
}
