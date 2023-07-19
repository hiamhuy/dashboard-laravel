<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\typepost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostTypeController extends Controller
{
    //
    public function index(){
        $data = typepost::all();
        return view('app.posttype.index', compact('data'));
    }

    public function create(){
        $data = [];
        return view('app.posttype.create-or-edit', compact('data'));
    }
    
    public function insert(Request $request){
        $data = typepost::create([
            'name' => $request->get('name'),
            'isActive' => '1',
        ]);
        
        if($data){
            return redirect(route('posttype'))->with('success', 'Thêm mới thành công!');
        }else{
            return redirect(route('posttype'))->with('error', 'Đã có lỗi xảy ra!');
        }
    }

    public function edit($id){
        $data = typepost::find($id);
        return view('app.posttype.create-or-edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = typepost::find($id);
        $dataUpdate = array(
          'name' => $request->get('nameEdit'),
          'isActive'=>  $request->get('isActive')
        );
        $data->update($dataUpdate);
        if($data){
            return redirect(route('posttype'))->with('success', 'Cập nhật thành công!');
        }
    }

    public function delete(Request $request, $id){
        $data = typepost::find($id);
        $dataUpdate = array(
          'name' => $request->get('nameEdit'),
          'isActive'=>  $request->get('isActive')
        );
        $data->update($dataUpdate);
        if($data){
            return redirect(route('posttype'))->with('success', 'Cập nhật thành công!');
        }
    }
}