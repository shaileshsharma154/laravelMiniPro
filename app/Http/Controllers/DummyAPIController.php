<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DummyAPIController extends Controller
{
    //
    public function myFirstAPI(){
        return ["name"=>"Shailesh", "LastNAme"=>"Sharma"];
    }
}
