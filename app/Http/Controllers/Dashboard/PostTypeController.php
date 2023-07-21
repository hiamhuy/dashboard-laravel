<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\typepost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PostTypeController extends Controller
{
    //
    public function index(Request $request){
        if($request->has('searchData')){
            $data = typepost::where('name','LIKE','%'.$request->searchData.'%')->paginate(10);
        }else{
            $data = typepost::orderBy('id')->paginate(10);
        }
       
        $title = 'Xóa bản ghi!';
        $text = "Bạn có chắc chắn muốn xóa bản ghi này?";
        confirmDelete($title, $text);
        
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
        toast('Thêm mới thành công!', 'success');
        return redirect(route('posttype'));
        
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
        toast('Cập nhật thành công!', 'success');
        return redirect(route('posttype'));
    }

    public function delete($id){
        $data = typepost::find($id);
        $data->delete();
        Alert::success('Success', 'Xóa thành công!');
        return redirect(route('posttype'));
    }
}