<?php

namespace App\Repositories\Dashboard\System\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use App\Repositories\Dashboard\System\Role\RoleInterface;

class RoleRepository implements RoleInterface
{
    public function getAll(){
        return Role::all();
    }

    public function role_has_permissions(){
        $list = DB::table('roles')
                ->leftJoin('role_has_permissions','roles.id','=','role_has_permissions.role_id')
                ->select('roles.*','role_has_permissions.*')
                ->get();
      
        return $list;
    }

    public function get_list_and_checked(){
        return DB::table('role_has_permissions')->get();
    }

    public function getDataPaginate(Request $request){
        if($request->has('searchData')){
            $data = Role::where('name','LIKE','%'.$request->searchData.'%')->paginate(10);
        }else{
            $data = Role::orderBy('id')->paginate(10);
        }
        return $data;
    }

    public function findById($id){
        return Role::find($id);
    }

    public function insertData(Request $request){
        $data = $request->all();
        $role = new Role();
        $role->name = $data['name'];
        $role->guard_name = 'web';
        $role->save();
        toast('Thêm vai trò thành công!', 'success');
    }

    public function updateData(Request $request, $id){
        $_request = $request->all();
        $data = $this->findById($id);
        $data->name = $_request['nameEdit'];
        $data->save();
        toast('Cập nhật thành công!', 'success');
    }
    
    public function deleteData($id){
        $data = $this->findById($id);
        $data->delete();
        Alert::success('Success', 'Xóa thành công!');
    }

    public function notifyDelete(){
        $title = 'Xóa bản ghi!';
        $text = "Bạn có chắc chắn muốn xóa bản ghi này?";
        confirmDelete($title, $text);
    }

    public function assignRole(Request $request, $id){
        $_request = $request->all();
        $role = $this->findById($id);
        foreach($_request['permissions'] as $r){
            $role->givePermissionTo($r);
        }
        Alert::success('Success', 'Gán thành công!');
    }

}