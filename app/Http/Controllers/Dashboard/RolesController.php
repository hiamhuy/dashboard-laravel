<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\System\Role\RoleInterface;
use App\Repositories\Dashboard\System\Permission\PermissionInterface;

class RolesController extends Controller
{
    public $roleInter;
    public $permissionInter;

    public function __construct(RoleInterface $roleInter, PermissionInterface $permissionInter){
        $this->roleInter = $roleInter;
        $this->permissionInter = $permissionInter;
    }
    
    public function index(Request $request){
        $roles = $this->roleInter->getDataPaginate($request);
        $this->roleInter->notifyDelete();
        return view('app.system.role.index', compact('roles'));
    }

    
    public function create(){
        $data = [];
        return view('app.system.role.create-or-edit', compact('data'));
    }

    public function insert(Request $request){
        $this->roleInter->insertData($request);
        return redirect(route('system.role'));
    }

    public function edit($id){
       $data = $this->roleInter->findById($id);
       return view('app.system.role.create-or-edit', compact('data'));
    }

    public function update(Request $request, $id){
        $this->roleInter->updateData($request, $id);
        return redirect(route('system.role'));
    }

    public function delete($id){
       $this->roleInter->deleteData($id);
       return redirect(route('system.role'));
    }

    public function assign($id){
        $data = $this->roleInter->findById($id);
        $listPers = $this->permissionInter->getAll();
        $role_has_p = $this->roleInter->get_list_and_checked();
        // dd($role_has_p);
        return view('app.system.role.assign-permission', compact('data','listPers','role_has_p'));
    }
    
    public function assignAction(Request $request, $id){
        $this->roleInter->assignRole($request,$id);
        return redirect(route('system.role'));
    }

}