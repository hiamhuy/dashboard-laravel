<?php

namespace App\Repositories\Dashboard\System\Role;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Repositories\Dashboard\System\Role\RoleInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class RoleRepository implements RoleInterface
{
    public function getAll(){
        return Role::all();
    }

    public function getDataPaginate(Request $request){
        if($request->has('searchData')){
            $data = Role::where('name','LIKE','%'.$request->searchData.'%')->paginate(10);
        }else{
            $data = Role::orderBy('id')->paginate(10);
        }
        return $data;
    }
}