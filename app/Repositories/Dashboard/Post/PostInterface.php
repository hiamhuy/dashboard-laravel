<?php

namespace App\Repositories\Dashboard\Post;

interface PostInterface
{
    public function getDataBySlug($slug);
    public function getRelatedPosts($categoryId, $id);
    public function getItems($skip=0, $take);
}