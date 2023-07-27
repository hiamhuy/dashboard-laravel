<?php

namespace App\Repositories\Dashboard\System\Permission;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Repositories\Dashboard\System\Permission\PermissionInterface;

class PermissionRepository implements PermissionInterface
{

    public function getDataPaginate(Request $request){
        if($request->has('searchData')){
            $data = Permission::where('name','LIKE','%'.$request->searchData.'%')->paginate(10);
        }else{
            $data = Permission::orderBy('id')->paginate(10);
        }
        return $data;
    }
}