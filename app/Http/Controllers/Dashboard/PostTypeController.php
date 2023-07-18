<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostTypeController extends Controller
{
    //
    public function index(){
        return view('app.posttype.index');
    }
}