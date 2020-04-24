@extends('admin.master')

@section('title')
Add-Category
@endsection

@section('body')
<br>
<h1 class="text-center text-success">Add Category</h1>

<div class="row">
    <div class='col-md-12'>
        <br/>
        <h1 class="text-center text-success">{{Session::get('message')}}</h1>
        <div class="well">
            <form action="new-category" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label class="control-label col-md-3"> Category Name</label>
                    <div class="col-md-9">
                        <input type='text' name="category_name" class="form-control"/>
                        <span class="text-danger"> {{$errors->has('category_name') ? $errors->first('category_name'): ''}}</span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3"> Category Description</label>
                    <div class="col-md-9">
                        <textarea class="form-control" name="category_description"></textarea>
                        <span class="text-danger">{{$errors->has('category_description') ? $errors->first('category_description') : ''}}</span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-md-3"> Publication Status</label>
                    <div class="col-md-9">
                        <label><input type="radio" name="publication_status" value="1" checked="" /> Published</label>
                        <label><input type="radio" name="publication_status" value="0"/> Unpublished</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Category Info"/>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection