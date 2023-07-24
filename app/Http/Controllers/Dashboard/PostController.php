<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Posts;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryPosts;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    //
    public function index(Request $request){
        if($request->has('searchData')){
            $data = Posts::where('name','LIKE','%'.$request->searchData.'%')
            ->orderBy('created_at','DESC')->paginate(5);
        }else{
            $data = Posts::orderBy('created_at','DESC')->paginate(5);
        }

        $type = CategoryPosts::all();
       
        $title = 'Xóa bản ghi!';
        $text = "Bạn có chắc chắn muốn xóa bản ghi này?";
        confirmDelete($title, $text);
        
        // $data = Posts::all();
        return view('app.post.index', compact('data','type'));
    }
    public function create(){
        $data = [];
        $type = CategoryPosts::take(50)->get();
        return view('app.post.create-or-edit', compact('data',"type"));
    }
    
    public function insert(Request $request){
        $data = Posts::create([
            'image' => '',
            'name' => ($request->get('name'))?$request->get('name'):'',
            'slug' => Str::slug($request->get('slug')),
            'title' => ($request->get('title'))?$request->get('title'):'',
            'content' => ($request->get('content'))?$request->get('content'):'',
            'category' => $request->get('category')?$request->get('category'):'0',
            'created_by' => Auth::user()->id,
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
        $type = CategoryPosts::take(50)->get();
        return view('app.post.create-or-edit', compact('data','type'));
    }

    public function update(Request $request, $id){
        $data = Posts::find($id);
        $dataUpdate = array(
            'name' => $request->get('e_name')? $request->get('e_name'):'',
            'slug' => Str::slug($request->get('e_slug')),
            'title' => $request->get('e_title')?$request->get('e_title'):'',
            'content' => $request->get('e_content')?$request->get('e_content'):'',
            'category' => $request->get('e_category')?$request->get('e_category'):'0',
            'status' => $request->get('status'),
            'created_by' => Auth::user()->id,
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