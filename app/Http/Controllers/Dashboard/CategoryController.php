<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryPosts;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //
    public function index(Request $request){
        if($request->has('searchData')){
            $data = CategoryPosts::where('name','LIKE','%'.$request->searchData.'%')->paginate(10);
        }else{
            $data = CategoryPosts::orderBy('id')->paginate(10);
        }
       
        $title = 'Xóa bản ghi!';
        $text = "Bạn có chắc chắn muốn xóa bản ghi này?";
        confirmDelete($title, $text);
        
        return view('app.category.index', compact('data'));
    }

    public function create(){
        $data = [];
        return view('app.category.create-or-edit', compact('data'));
    }
    
    public function insert(Request $request){
        $data = CategoryPosts::create([
            'name' => $request->get('name'),
            'isActive' => '1',
            'created_by' => Auth::user()->id,
        ]);
        toast('Thêm mới thành công!', 'success');
        return redirect(route('category'));
        
    }

    public function edit($id){
        $data = CategoryPosts::find($id);
        return view('app.category.create-or-edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = CategoryPosts::find($id);
        $dataUpdate = array(
          'name' => $request->get('nameEdit'),
          'isActive'=>  $request->get('isActive')
        );
        $data->update($dataUpdate);
        toast('Cập nhật thành công!', 'success');
        return redirect(route('category'));
    }

    public function delete($id){
        $data = CategoryPosts::find($id);
        $data->delete();
        Alert::success('Success', 'Xóa thành công!');
        return redirect(route('category'));
    }
}