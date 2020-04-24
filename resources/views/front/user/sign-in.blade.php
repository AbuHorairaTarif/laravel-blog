@extends('front.master')

@section('title')
Sign In
@endsection

@section('body')
<br/>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="text-center text-danger">{{Session::get('message')}}</h2>
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center text-info">Login Form</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('visitor-sign-in')}}" method="POST">
                        @csrf                      
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Email Address</label>
                            <div class="col-md-9">
                                <input type="email" name="email_address" class="form-control" placeholder="Type Your Email Address">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" placeholder="Type Your Password">
                            </div>
                        </div>
                        
                                                
                        <div class="form-group row">
                            <label class="col-form-label col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success btn-block" name="btn" value="Login">
                            </div>
                        </div>
                        
                    </form>
                </div>
                
                </div>
            
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Single Comment -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            
            <!-- Comment with nested comments -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                </div>
                
            </div>
            
            
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
    
    </div>

@endsection