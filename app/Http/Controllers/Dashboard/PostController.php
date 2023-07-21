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
            $data = Posts::where('name','LIKE','%'.$request->searchData.'%')->paginate(5);
        }else{
            $data = Posts::orderBy('created_at')->paginate(5);
        }

        $type = typepost::all();
       
        $title = 'Xóa bản ghi!';
        $text = "Bạn có chắc chắn muốn xóa bản ghi này?";
        confirmDelete($title, $text);
        
        // $data = Posts::all();
        return view('app.post.index', compact('data','type'));
    }
    public function create(){
        $data = [];
        $type = typepost::where('isActive','=','1')->orderBy('id')->paginate(50);
        return view('app.post.create-or-edit', compact('data',"type"));
    }
    
    public function insert(Request $request){
        $data = Posts::create([
            'image' => '',
            'name' => ($request->get('name'))?$request->get('name'):'',
            'title' => ($request->get('title'))?$request->get('title'):'',
            'content' => ($request->get('content'))?$request->get('content'):'',
            'type' => $request->get('type')?$request->get('type'):'0',
        ]);
        if($request -> hasFile('image')){
            $request -> file('image')->move('storage/post', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        toast('Thêm mới thành công!', 'success');
        return redirect(route('post'));
        
    }

    public function edit($id){
        $data = Posts::find($id);
        $type = typepost::where('isActive','=','1')->orderBy('id')->paginate(50);
        return view('app.post.create-or-edit', compact('data','type'));
    }

    public function update(Request $request, $id){
        $data = Posts::find($id);
        $dataUpdate = array(
            'name' => $request->get('e_name')? $request->get('e_name'):'',
            'title' => $request->get('e_title')?$request->get('e_title'):'',
            'content' => $request->get('e_content')?$request->get('e_content'):'',
            'type' => $request->get('e_type')?$request->get('e_type'):'0',
        );
        if($request -> hasFile('e_image')){
            $request -> file('e_image')->move('storage/post', $request->file('e_image')->getClientOriginalName());
            $data->image = $request->file('e_image')->getClientOriginalName();
            $data->save();
        }
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