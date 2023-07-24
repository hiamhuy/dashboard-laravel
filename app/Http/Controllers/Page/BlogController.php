<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        return view('pages.blog.blog');
    }

    public function getBlogDetail()
    {
        return view('pages.blog.blog-detail');
    }
}