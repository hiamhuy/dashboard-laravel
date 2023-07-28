<?php

namespace App\Repositories\Dashboard\System\Permission;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use App\Repositories\Dashboard\System\Permission\PermissionInterface;

class PermissionRepository implements PermissionInterface
{
    public function getAll(){
        return Permission::all();
    }

    public function getDataPaginate(Request $request){
        if($request->has('searchData')){
            $data = Permission::where('name','LIKE','%'.$request->searchData.'%')->paginate(10);
        }else{
            $data = Permission::orderBy('id')->paginate(10);
        }
        return $data;
    }

    public function findById($id){
        return Permission::find($id);
    }

    public function insertData(Request $request){
        $data = $request->all();
        $permission = new Permission();
        $permission->name = $data['name'];
        $permission->guard_name = 'web';
        $permission->save();
        toast('Thêm quyền thành công!', 'success');
    }

    public function updateData(Request $request, $id){
        $data = $this->findById($id);
        $_request = $request->all();
        $data->name = $_request['nameEdit'];
        $data->guard_name = 'web';
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

    public function assignPermission($request ,$id){
        $_request = $request->all();
        $permission = $this->findById($id);
        foreach($_request['roles'] as $r){
            $permission->assignRole($r);
        }
        Alert::success('Success', 'Gán thành công!');
    }

}