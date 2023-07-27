<?php

namespace App\Http\Controllers\Page;

use Carbon\Carbon;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\CategoryPosts;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\Category\CategoryInterface;
use App\Repositories\Page\Blog\BlogInterface;
use App\Repositories\Dashboard\Post\PostInterface;

class BlogController extends Controller
{
    public $getArrCategory;
    public $blogInterface;
    public $categoryInterface;
    public $postInterface;
    public function __construct(
        BlogInterface $blogInterface,
        CategoryInterface $categoryInterface,
        PostInterface $postInterface
    )
    {
        Carbon::setLocale('vi');
        
        $this->blogInterface = $blogInterface;
        $this->categoryInterface = $categoryInterface;
        $this->postInterface = $postInterface;
    }
    //
    public function index()
    {
        $arrCategory = $this->categoryInterface->getCategoryBlog();

        return view('pages.blog.blog',compact('arrCategory'));
    }
    
    public function getItemGrid(){
        $skip = $_GET['skip'];
        $take = $_GET['take'];
        return $this->blogInterface->getItemsPost($skip,$take);
    }

    public function getBlogDetail($slug)
    { 
        $arrCategory = $arrCategory = $this->categoryInterface->getCategoryBlog();

        $data = $this->postInterface->getDataBySlug($slug);

        $dataRelatedPosts = $this->postInterface->getRelatedPosts($data->category, $data->id);

        return view('pages.blog.blog-detail',compact('arrCategory','data','dataRelatedPosts'));
    }


    public function getItemByCategory($search){
        
        $arrCategory = $arrCategory = $this->categoryInterface->getCategoryBlog();
        return view('pages.blog.blog', compact('arrCategory'));

    }

    public function aboutUs(){
        return view('pages.blog.about-us');
    }
    
    public function contact(){
        return view('pages.blog.contact');
    }
}