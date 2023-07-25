<?php

namespace App\Repositories\Dashboard\Category;

use App\Models\CategoryPosts;
use App\Repositories\Dashboard\Category\CategoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class CategoryRepository extends BaseRepository
{
   
    public function __construct(){
        
    }

    public function model()
    {
        CategoryPosts::class;
    }

    public function getAll()
    {
        return $this->model()::all();
    }

    public function getCategoryBlog()
    {
        return CategoryPosts::where('isActive','=','1')->take(5)->get();
    }

    
    
}