<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\System\Role\RoleInterface;

class RolesController extends Controller
{
    public $roleInter;

    public function __construct(RoleInterface $roleInter){
        $this->roleInter = $roleInter;
    }
    
    public function index(Request $request){
        $roles = $this->roleInter->getDataPaginate($request);
        $title = 'Xóa bản ghi!';
        $text = "Bạn có chắc chắn muốn xóa bản ghi này?";
        confirmDelete($title, $text);
        return view('app.system.role.index', compact('roles'));
    }

    
    public function create(){
        return view('app.system.role.create-or-edit');
    }

    public function insert(){
       
    }

}