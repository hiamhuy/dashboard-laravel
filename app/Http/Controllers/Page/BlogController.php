<?php

namespace App\Http\Controllers\Page;

use Carbon\Carbon;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\CategoryPosts;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\Page\Blog\BlogInterface;
use App\Repositories\Page\Blog\BlogRepository;
use App\Repositories\Dashboard\Post\PostRepository;
use App\Repositories\Dashboard\Category\CategoryRepository;

class BlogController extends Controller
{
    public $getArrCategory;
    public $blogRepository;
    public $categoryRepo;
    public $postRepo;
    public function __construct(
        BlogRepository $blogRepository,
        CategoryRepository $categoryRepo,
        PostRepository $postRepo
    )
    {
        Carbon::setLocale('vi');
        
        $this->blogRepository = $blogRepository;
        $this->categoryRepo = $categoryRepo;
        $this->postRepo = $postRepo;
    }
    //
    public function index()
    {
        $arrCategory = $this->categoryRepo->getCategoryBlog();

        return view('pages.blog.blog',compact('arrCategory'));
    }
    
    public function getItemGrid(){
        $skip = $_GET['skip'];
        $take = $_GET['take'];
        return $this->blogRepository->getItemsPost($skip,$take);
    }

    public function getBlogDetail($slug)
    { 
        $arrCategory = $arrCategory = $this->categoryRepo->getCategoryBlog();

        $data = $this->postRepo->getDataBySlug($slug);

        $dataRelatedPosts = $this->postRepo->getRelatedPosts($data->category, $data->id);

        return view('pages.blog.blog-detail',compact('arrCategory','data','dataRelatedPosts'));
    }


    public function getItemByCategory($search){
        
        $arrCategory = $arrCategory = $this->categoryRepo->getCategoryBlog();
        return view('pages.blog.blog', compact('arrCategory'));

    }

    public function aboutUs(){
        return view('pages.blog.about-us');
    }
    
    public function contact(){
        return view('pages.blog.contact');
    }
}