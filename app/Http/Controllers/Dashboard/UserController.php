<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\System\User\UserInterface;

class UserController extends Controller
{
    public $userInterface;

    public function __construct(UserInterface $userInterface){
        $this->userInterface = $userInterface;
    }
    //
    public function index(Request $request){
        $data = $this->userInterface->getDataPaginate($request);
        return view('app.system.user.index', compact('data'));
    }
}