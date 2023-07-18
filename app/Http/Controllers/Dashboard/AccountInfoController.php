<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountInfoController extends Controller
{
    //
    public function index(){
        return view('app.account-info.index');
    }
}