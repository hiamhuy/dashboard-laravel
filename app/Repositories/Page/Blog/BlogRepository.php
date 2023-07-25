<?php

namespace App\Repositories\Page\Blog;

use App\Repositories\Dashboard\Post\PostRepository;
use Carbon\Carbon;
use App\Repositories\Page\Blog\BlogInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class BlogRepository
{
    public $post;
    public function __construct(PostRepository $post)
    {
        Carbon::setLocale('vi');
        // parent::__construct();
        $this->post = $post;
    }

    
    
    public function getItemsPost($skip, $take){
        $arrItem = $this->post->getItems($skip, $take);
        return $arrItem;
    }

    public function getItemByCategory($categoryId){
        $arrItem =  $this->post->model()::where('category','=',$categoryId)
                    ->join('category_posts','posts.category','=','category_posts.id')
                    ->select('posts.*','category_posts.name as name_category')
                    ->orderBy('created_at','DESC')
                    ->take(13)->get();
        
                    foreach($arrItem as $item){
                        $item->created_at = Carbon::parse($item->created_at);
                    }

    }
}