<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConController extends Controller
{
    public function index(){
        //return DB::select ("select * from customers");
        return DB::table('customers')->get();
    }
}
