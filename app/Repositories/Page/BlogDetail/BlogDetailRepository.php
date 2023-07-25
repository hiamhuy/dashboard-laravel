<?php

namespace App\Repositories\Page\BlogDetail;

use App\Repositories\Page\BlogDetail\BlogDetailInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

class BlogDetailRepository extends BaseRepository implements BlogDetailInterface
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        
    }
}