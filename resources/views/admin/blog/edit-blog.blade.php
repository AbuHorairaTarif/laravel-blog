@extends('admin.master')

@section('title')
Edit Blog
@endsection

@section('body')
<br>
<h1 class="text-center text-success">Update Blog Blog</h1>

<div class="row">
    <div class='col-md-12'>
        <br/>
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <div class="well">
            <form action="{{route('update-blog')}}" method="POST" enctype="multipart/form-data" class="form-horizontal" name="editBlogForm">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3">Category Name</label>
                    <div class='col-md-9'> 
                    <select name='category_id' class="form-control">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3">Blog Title</label>
                    <div class="col-md-9">
                        <input type='text' name="blog_title" value="{{$blog->blog_title}}" class="form-control"/>
                        <input type='hidden' name="id" value="{{$blog->id}}" class="form-control"/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3"> Blog Short Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="blog_short_description" >{{$blog->blog_short_description}}</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3"> Blog Long Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="blog_long_description" id="editor" >{{$blog->blog_long_description}}</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3"> Blog Image</label>
                    <div class="col-md-9" >
                        <input type='file' name='blog_image' accept="image/*" >
                        <img src="{{asset($blog->blog_image)}}" title="" alt="" height="70" width="70" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3"> Publication Status</label>
                    <div class="col-md-9">
                        <label><input type="radio" name="publication_status" value="1" {{$blog->publication_status == 1 ? 'checked' : ''  }}  /> Published</label>
                        <label><input type="radio" name="publication_status" value="0" {{$blog->publication_status == 0 ? 'checked' : ''  }} /> Unpublished</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Blog Info"/>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    document.forms['editBlogForm'].elements['category_id'].value = '{{$blog->category_id}}';
</script>

@endsection