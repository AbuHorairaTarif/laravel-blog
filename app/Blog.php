<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blog;
use Illuminate\Support\Facades\DB;
use Image;

class Blog extends Model {

    protected $fillable = ['category_id', 'blog_title', 'blog_short_description', 'blog_long_description', 'blog_image', 'publication_status'];

    private function imageUpload($blogImage){
        $imageName                                                   = $blogImage->getClientOriginalName();
        $directory                                                   = 'admin/blog_images/';
        Image::make($blogImage)->save($directory.$imageName);
        //$blogImage->move($directory, $imageName);
        return  $directory.$imageName;
    }

    public static function newBlogInfo($request) {
        $blog                                                        = new Blog();
        $blog->category_id                                           = $request->category_id;
        $blog->blog_title                                            = $request->blog_title;
        $blog->blog_short_description                                = $request->blog_short_description;
        $blog->blog_long_description                                 = $request->blog_long_description;
        $blog->blog_image                                            = $blog->imageUpload($request->file('blog_image'));
        $blog->publication_status                                    = $request->publication_status;
        $blog->save();
    }

    public static function manageBlogInfo(){
         return DB::table('blogs')
                ->join('categories','blogs.category_id', '=', 'categories.id')
                ->select('blogs.*','categories.category_name')
                ->orderBy('blogs.id','desc')
                ->get();
    }

    public static function updateBloginfo($request)
    {
        $blog                                                        = Blog::find($request->id);
        $blogImage                                                   = $request->file('blog_image');
        if($blogImage)
        {
            unlink($blog->blog_image);
            $imagePath                                               = $blog->imageUpload($blogImage);
        }

        $blog->category_id                                           = $request->category_id;
        $blog->blog_title                                            = $request->blog_title;
        $blog->blog_short_description                                = $request->blog_short_description;
        $blog->blog_long_description                                 = $request->blog_long_description;
        if(isset($imagePath)){
            $blog->blog_image                                        = $imagePath;
        }
        $blog->publication_status                                    = $request->publication_status;

        $blog->save();

        return redirect('/blog/manage-blog')
                                            ->with('message','Blog Info Updated Successfully');

    }

    public static function deleteBlogInfo($request)
    {
        $blog = Blog::find($request->id);
        if(file_exists($blog->blog_image)){
        unlink($blog->blog_image);
        }
        $blog->delete();
    }




    }
