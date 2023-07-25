<?php

namespace App\Repositories\Dashboard\Post;

use Carbon\Carbon;
use App\Models\Posts;
use App\Repositories\Dashboard\Post\PostInterface;
use App\Repositories\Dashboard\Category\CategoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class PostRepository extends BaseRepository
{
    
    public $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository){

        // parent::__construct();
        $this->categoryRepository = $categoryRepository;
        
    }

    public function model()
    {
        return Posts::class;
    }

    public function getDataBySlug($slug){
        $data = Posts::where('slug','=',$slug)->first();
        $data->created_at = Carbon::parse($data->created_at);
        return $data;
    }

    public function getRelatedPosts($categoryId, $id){
        $arrItem = Posts::where('category','=',$categoryId)
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

    public function getItems($skip=0, $take){
        $arrItem = Posts::join('category_posts','posts.category','=','category_posts.id')
                        ->select('posts.*','category_posts.name as name_category')
                        ->orderBy('created_at','DESC')->skip($skip)->take($take)
                        ->get();

                foreach($arrItem as $item){
                    $item->created_at = Carbon::parse($item->created_at);
                }
        return $arrItem;
    }


    
}