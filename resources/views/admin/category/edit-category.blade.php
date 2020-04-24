@extends('admin.master')

@section('title')
Edit Category
@endsection

@section('body')
<br>
<h1 class="text-center text-info">Edit Category Information</h1>
<div class="row">
    <div class='col-md-12'>
        <br/>
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <div class="well">
            <form action="{{route('update-category')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3"> Category Name</label>
                    <div class="col-md-9">
                        <input type='text' name="category_name" class="form-control" value="{{$category->category_name}}"/>
                        <input type='hidden' name="id" class="form-control" value="{{$category->id}}"/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3"> Category Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="category_description">{{$category->category_description}}</textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3"> Publication Status</label>
                    <div class="col-md-9">
                        <label><input type="radio" name="publication_status" value="1" {{$category->publication_status == 1 ? 'checked' : '' }} /> Published</label>
                        <label><input type="radio" name="publication_status" value="0" {{$category->publication_status == 0 ? 'checked' : '' }} /> Unpublished</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Category Info"/>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection