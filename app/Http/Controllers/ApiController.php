<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Category;
use App\Blog;

class ApiController extends Controller
{
    public function allPublishedCategories()
    {
    $categories = Category::where('publication_status',1)->get();
    return $categories;
    }

    public function allPublishedBlog(){
    return Blog::where('publication_status',1)->get();
    }

    public function blogByCategoryId($id){
    return Blog::where('category_id',$id)->where('publication_status',1)->get();
    }

    public function blogById($id){
    return Blog::find($id);
    }

}
