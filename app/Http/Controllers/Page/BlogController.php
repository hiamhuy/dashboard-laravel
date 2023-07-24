<?php

namespace App\Http\Controllers\Page;

use Carbon\Carbon;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\CategoryPosts;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public $getArrCategory;
    public function __construct()
    {
        Carbon::setLocale('vi');
        $this->getArrCategory = $this->getCategory();
    }
    //
    public function index()
    {
        $arrCategory = $this->getArrCategory;
        $getNewItem = $this->getItemCardOne()->take(1);
        $getItemCardOne = $this->getItemCardOne()->skip(1)->take(6);
        $getItemCardTwo = $this->getItemCardOne()->skip(7)->take(6);
        //  dd($getItem);
        return view('pages.blog.blog', compact('arrCategory','getNewItem','getItemCardOne','getItemCardTwo'));
    }
    
    public function getCategory(){
        return CategoryPosts::where('isActive','=','1')->take(5)->get();
    }

    public function getItemCardOne(){
        $arrItem = DB::table('posts')->join('category_posts','posts.category','=','category_posts.id')
                    ->select('posts.*','category_posts.name as name_category')
                    ->orderBy('created_at','DESC')->take(13)
                    ->get();
        
                    foreach($arrItem as $item){
                        $item->created_at = Carbon::parse($item->created_at);
                    }
        return $arrItem;
    }

    public function getBlogDetail($slug)
    { 
        $arrCategory = $this->getArrCategory;
        $data = Posts::where('slug','=',$slug)->first();
        $data->created_at = Carbon::parse($data->created_at);
        $dataRelatedPosts = $this->getRelatedPosts($data->category, $data->id);
        return view('pages.blog.blog-detail',compact('arrCategory','data','dataRelatedPosts'));
    }
    
    public function getRelatedPosts($search, $id){
        $arrItem = Posts::where('category','=',$search)
                    ->join('category_posts','posts.category','=','category_posts.id')
                    ->select('posts.*','category_posts.name as name_category')
                    ->where('posts.id','!=',$id)
                    ->orderBy('created_at','DESC')
                    ->take(6)->get();
                    
                foreach($arrItem as $item){
                    $item->created_at = Carbon::parse($item->created_at);
                }

        return $arrItem;
    }

    public function getItemByCategory($search){
        $arrCategory = $this->getArrCategory;
        
        $arrItem = Posts::where('category','=',$search)
                    ->join('category_posts','posts.category','=','category_posts.id')
                    ->select('posts.*','category_posts.name as name_category')
                    ->orderBy('created_at','DESC')
                    ->take(13)->get();
                    
                foreach($arrItem as $item){
                    $item->created_at = Carbon::parse($item->created_at);
                }

        $getNewItem = $arrItem->take(1)->get();
        
        $getItemCardOne = $arrItem->skip(1)->take(6)->get();

        $getItemCardTwo = $arrItem->skip(7)->take(6)->get();

        return view('pages.blog.blog', compact('arrCategory','getNewItem','getItemCardOne','getItemCardTwo'));

    }
}