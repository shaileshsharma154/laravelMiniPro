<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function UserAuthendication(Request $req){
        $data= $req->input();
        $req->session()->put('user_id',$data['user_id']);
        return redirect('CustomerView');

    }
}
