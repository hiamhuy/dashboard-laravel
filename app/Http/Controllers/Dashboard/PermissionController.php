<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\System\Permission\PermissionInterface;

class PermissionController extends Controller
{
    public $per;

    public function __construct(PermissionInterface $per){
        $this->per = $per;
    }
    //
    public function index(Request $request){
        $permissions = $this->per->getDataPaginate($request);

        $title = 'Xóa bản ghi!';
        $text = "Bạn có chắc chắn muốn xóa bản ghi này?";
        confirmDelete($title, $text);
        
        return view('app.system.permission.index',compact('permissions'));
    }
}