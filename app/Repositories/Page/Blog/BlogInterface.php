<?php

namespace App\Repositories\Page\Blog;

interface BlogInterface
{
    public function getItemsPost($skip, $take);
    public function getItemByCategory($categoryId);
}