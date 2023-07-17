<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PosttypeController extends Controller
{
    //
    public function index(){
        return view('posttype.index');
    }
}