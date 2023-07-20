<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Posts;
use App\Models\typepost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    //
    public function index(Request $request){
        if($request->has('searchData')){
            $data = Posts::where('name','LIKE','%'.$request->searchData.'%')->get();
        }else{
            $data = Posts::orderBy('id')->paginate(10);
        }
       
        $title = 'Xóa bản ghi!';
        $text = "Bạn có chắc chắn muốn xóa bản ghi này?";
        confirmDelete($title, $text);
        
        // $data = Posts::all();
        return view('app.post.index', compact('data'));
    }
    public function create(){
        $data = [];
        $type = typepost::where('isActive','1')->orderBy('id')->paginate(50);
        return view('app.post.create-or-edit', compact('data',"type"));
    }
    
    public function insert(Request $request){
        Posts::create([
            'name' => $request->get('name'),
            'isActive' => '1',
        ]);
        toast('Thêm mới thành công!', 'success');
        return redirect(route('post'));
        
    }

    public function edit($id){
        $data = Posts::find($id);
        return view('app.post.create-or-edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Posts::find($id);
        $dataUpdate = array(
          'name' => $request->get('nameEdit'),
          'isActive'=>  $request->get('isActive')
        );
        $data->update($dataUpdate);
        toast('Cập nhật thành công!', 'success');
        return redirect(route('post'));
    }

    public function delete($id){
        $data = Posts::find($id);
        $data->delete();
        Alert::success('Success', 'Xóa thành công!');
        return redirect(route('post'));
    }
}