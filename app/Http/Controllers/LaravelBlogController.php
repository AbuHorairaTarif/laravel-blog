<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use DB;

class LaravelBlogController extends Controller
{
    public function index()
    {        
        return view('front.home.home',[
            'categories'                    => Category::where('publication_status',1)->orderBy('category_name','asc')->get(),
            'blogs'                           => Blog::where('publication_status',1)->orderBy('id','desc')->get(),
            'popularBlogs'                => Blog::orderBy('hit_count', 'desc')->take(3)->get()
        ]);
    }
    
    public function categoryBlog($id)
    {
        return view('front.category.category-blog',[
            'categories'                    => Category::where('publication_status',1)->orderBy('category_name','asc')->get(),
            'category_names'           => Category::where('id',$id)->get(),
            'blogs'                           => Blog::where('category_id',$id)->where('publication_status',1)->get()
        ]);
    }
    
    public function blogDetails($id)
    {
        $blog = Blog::find($id);
        $blog->hit_count = $blog->hit_count+1;
        $blog->save();
        
        return view('front.blog.blog-details',[
            'categories'                   => Category::where('publication_status',1)->get(),
            'blogs'                          => Blog::where('id',$id)->get(),
            'comments'                  => DB::table('comments')
                                               ->join('visitors', 'comments.visitor_id', '=', 'visitors.id')
                                               ->select('comments.*', 'visitors.first_name', 'visitors.last_name')
                                               ->where('comments.blog_id', $id)
                                               ->where('comments.publication_status',1)
                                               ->orderBy('comments.id','desc')
                                               ->get()
        ]);
    }
}
