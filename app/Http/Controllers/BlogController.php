<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use DB;
use App\Comment;

class BlogController extends Controller
{
    public function addBlog()
    {
        return view('admin.blog.add-blog',[
            'categories'    => Category::where('publication_status',1)->get()
        ]);
    }
    
    public function newBlog(Request $request){
        Blog::newBlogInfo($request);
        
        return redirect('/home/add-blog')
                ->with('message','Blog Added Successfully');
    }
    
    public function manageBlog()
    {
        $blogs = Blog::manageBlogInfo();
                
        return view ('admin.blog.manage-blog',[
            'blogs' => $blogs
        ]);
    }
    
    public function editBlog($id){
        return view('admin.blog.edit-blog',[
           'categories'    => Category::where('publication_status',1)->get(),
           'blog'   => Blog::find($id) 
        ]);
    }
    
    public function updateBlog(Request $request){
        Blog::updateBlogInfo($request);
        return redirect('/home/manage-blog')
                ->with('message','Update Blog Info Successfully');
    }
    
    public function deleteBlog(Request $request)
    {
        Blog::deleteBlogInfo($request);
        return redirect('/home/manage-blog')
                ->with('message','Deleted Blog Info Successfully');
    }
    
    public function manageComment(){
        return view('admin.comment.manage-comment',[
            'comments'  => DB::table('comments')
                                ->join('visitors', 'comments.visitor_id', '=', 'visitors.id')
                                ->join('blogs', 'comments.blog_id', '=', 'blogs.id')
                                ->select('comments.*', 'visitors.first_name', 'visitors.last_name', 'blogs.blog_title')
                                ->orderBy('comments.id', 'desc')
                                ->get()
        ]);
    }
    
    public function unpublishedComment($id){
        $comment = Comment::find($id);
        $comment->publication_status = 0;
        $comment->save();
        
        return redirect('/manage-comment');
    }
    
    public function publishedComment($id){
        $comment = Comment::find($id);
        $comment->publication_status = 1;
        $comment->save();
        
        return redirect('/manage-comment');
    }
    
}
