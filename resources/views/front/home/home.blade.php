@extends('front.master')

@section('title')
Homepage
@endsection

@section('body')
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>First Slide</h3>
            <p>This is a description for the first slide.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Second Slide</h3>
            <p>This is a description for the second slide.</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h3>Third Slide</h3>
            <p>This is a description for the third slide.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4 text-center text-info">Recent News</h1>

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

    <!-- /.row -->

    <!-- Portfolio Section -->
    <br/>
    <hr>
    <h1 class="text-info text-center my-5">Popular Blogs</h1>

    <div class="row">
         @foreach($popularBlogs as $popularblog)
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
            <img src="{{asset($popularblog->blog_image)}}" class="img-fluid" alt="" title="" />
          <h4 class="card-header text-center">{{$popularblog->blog_title}}</h4>
          <div class="card-body">
            <p class="card-text">{{$popularblog->blog_short_description}}</p>


          </div>
          <div class="text-center card-footer bg-light">
           <a href="{{route('blog-detail',['id'=>$popularblog->id])}}" class="btn btn-info">Details News </a>

          </div>

        </div>

      </div>
<br/>

      @endforeach
    </div>
    <!-- /.row -->

    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->


  </div>
  <!-- /.container -->

    <script>

  </script>
@endsection
