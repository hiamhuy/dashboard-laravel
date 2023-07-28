<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\System\Role\RoleInterface;
use App\Repositories\Dashboard\System\Permission\PermissionInterface;

class PermissionController extends Controller
{
    public $per;
    public $role;

    public function __construct(PermissionInterface $per, RoleInterface $role){
        $this->per = $per;
        $this->role = $role;
    }
    //
    public function index(Request $request){
        $permissions = $this->per->getDataPaginate($request);
        $this->per->notifyDelete();
        return view('app.system.permission.index',compact('permissions'));
    }

    public function create(){
        $data = [];
        return view('app.system.permission.create-or-edit', compact('data'));
    }

    public function insert(Request $request){
        $this->per->insertData($request);
        return redirect(route('system.permission'));
    }

    public function edit($id){
       $data = $this->per->findById($id);
       return view('app.system.permission.create-or-edit', compact('data'));
    }

    public function update(Request $request, $id){
        $this->per->updateData($request, $id);
        return redirect(route('system.permission'));
    }

    public function delete($id){
       $this->per->deleteData($id);
       return redirect(route('system.permission'));
    }
    
    public function assign($id){
        $data = $this->per->findById($id);
        $listRole = $this->role->getAll();
        $role_has_p = $this->role->get_list_and_checked();
        return view('app.system.permission.assign-role', compact('data','listRole','role_has_p'));
    }
    public function assignAction(Request $request,$id){
       
        $this->per->assignPermission($request, $id);
        return redirect(route('system.permission'));
    }
}