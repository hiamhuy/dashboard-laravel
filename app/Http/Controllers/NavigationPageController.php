<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NavigationPageController extends Controller
{
    //
    public function index(){
        return view('navigation-page.index');
    }
}