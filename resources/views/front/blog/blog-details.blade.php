@extends('front.master')

@section('title')
Blog-Details
@endsection

@section('body')

<div class="container">
@foreach($blogs as $blog)
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{$blog->blog_title}}
      
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{route('/')}}">Home</a>
      </li>
      <li class="breadcrumb-item active">{{$blog->blog_title}}</li>
    </ol>

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{asset($blog->blog_image)}}" alt="">

        <hr>

        <!-- Date/Time -->
        <p>{{$blog->created_at}}</p>

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$blog->blog_short_description}}</p>
        
        <p>{!! $blog->blog_long_description !!}</p>

        @endforeach
        <hr>
        <h6 class="text-success">{{Session::get('message')}}</h6>

        <!-- Comments Form -->
        @if(Session::get('visitorId'))
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
              <form action="{{route('new-comment')}}" method="POST">
                  @csrf
              <div class="form-group">
                  <textarea class="form-control" rows="3" name="comment"></textarea>
                <input type="hidden" name="visitor_id" value="{{Session::get('visitorId')}}">
                <input type="hidden" name="blog_id" value="{{$blog->id}}">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        @else
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
              <h4 class="card-title text-danger">Please <a href="{{route('visitor-sign-in-form')}}">login</a> to give Comment, or if you have not created account then <a href="{{route('sign-up')}}">Sign Up</a></h4>
       </div>
        </div>

        @endif
        <!-- Single Comment -->
        @foreach($comments as $comment)
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{$comment->first_name.' '.$comment->last_name}}</h5>
            <p>{{$comment->comment}}</p>
          </div>
        </div>
        @endforeach

        <!-- Comment with nested comments -->
        

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card mb-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
                @foreach($categories as $category)
                  
              <div class="col-lg-6">
                  
                <ul class="list-unstyled mb-0">
                    <li>
                    <a href="{{route('category-blog',['id' => $category->id ])}}">{{$category->category_name}}</a>
                  </li>
                  
                </ul>
                  
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>

  <!-- /.container -->
@endsection
