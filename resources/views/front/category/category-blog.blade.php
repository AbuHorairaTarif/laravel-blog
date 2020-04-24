@extends('front.master')

@section('title')

@endsection

@section('body')
<div class="container">
<!--@foreach($category_names as $category_name)-->
<h1 class="my-4 text-center text-info">{{$category_name->category_name.' '.'News'}}</h1><br/>
<!--@endforeach-->
    <!-- Marketing Icons Section -->

    <div class="row">
         @foreach($blogs as $blog)
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
            <img src="{{asset($blog->blog_image)}}" class="img-fluid" alt="" title="" />
          <h4 class="card-header text-center">{{$blog->blog_title}}</h4>
          <div class="card-body">
            <p class="card-text">{{$blog->blog_short_description}}</p>
          
          
          </div>
          <div class="text-center card-footer bg-light">
           <a href="{{route('blog-detail',['id'=>$blog->id])}}" class="btn btn-info">Details News </a>
           
          </div>
          
        </div>

      </div>
<br/>           

      @endforeach
    </div>
</div>
@endsection