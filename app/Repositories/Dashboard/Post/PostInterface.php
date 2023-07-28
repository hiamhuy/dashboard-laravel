<?php

namespace App\Repositories\Dashboard\Post;

use Illuminate\Http\Request;

interface PostInterface
{
    public function getDataView(Request $request);
    public function getDataBySlug($slug);
    public function getRelatedPosts($categoryId, $id);
    public function getItems($skip=0, $take);
    public function notifyDelete();
}