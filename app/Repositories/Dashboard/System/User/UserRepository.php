<?php

namespace App\Repositories\Dashboard\System\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Dashboard\System\User\UserInterface;

class UserRepository implements UserInterface
{
    public function getDataPaginate(Request $request){
        if($request->has('searchData')){
            $data = User::where('name','LIKE','%'.$request->searchData.'%')->paginate(10);
        }else{
            $data = User::orderBy('id')->paginate(10);
        }
        return $data;
    }
}