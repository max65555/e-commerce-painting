<?php

namespace App\Http\Controllers;
use Session;
use App\Models\account;
use Illuminate\Http\Request;

class WebadminController extends Controller
{
    //[get] /home
    public function account(){
        return view('WebAdmin/accountManagerment');
    }
}


