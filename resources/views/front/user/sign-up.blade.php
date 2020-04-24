@extends('front.master')

@section('title')
Sign Up
@endsection

@section('body')
<br/>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center text-info">Registration Form</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('new-sign-up')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">First Name</label>
                            <div class="col-md-9">
                                <input type="text" name="first_name" class="form-control" placeholder="Type Your First Name">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Last Name</label>
                            <div class="col-md-9">
                                <input type="text" name="last_name" class="form-control" placeholder="Type Your Last Name">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Email Address</label>
                            <div class="col-md-9">
                                <input type="email" name="email_address" class="form-control" placeholder="Type Your Email Address" onblur="emailCheck(this.value);">
                                <span id="res"></span>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" placeholder="Type Your Password">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Phone Number</label>
                            <div class="col-md-9">
                                <input type="number" name="phone_number" class="form-control" placeholder="Enter Your Phone Number">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Address</label>
                            <div class="col-md-9">
                                <textarea name="address" class="form-control" placeholder="Type Your Location"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success btn-block" name="btn" id="regBtn" value="Register Me">
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

<script>
//    function emailCheck(email){
//        var xmlHttp = new XMLHttpRequest();
//        var serverPage = "http://localhost:8083/laravel-blog/public/email-check/"+email;
//        xmlHttp.open('GET', serverPage);
//        xmlHttp.onreadystatechange= function(){
//            if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
//                document.getElementById('res').innerHTML = xmlHttp.responseText;
//                if(xmlHttp.responseText == 'Email Address is not available, try another one'){
//                    document.getElementById('regBtn').disabled = true;
//                    document.getElementById('res').style.color = 'red';
//                }
//                else {
//                    document.getElementById('regBtn').disabled = false;
//                     document.getElementById('res').style.color = 'green';
// 
//                }
//            }
//        }
//        xmlHttp.send();
//    }

// jQuery Ajax

function emailCheck(email){
    $.ajax({
       url: 'http://localhost:8083/laravel-blog/public/email-check/'+email,
       method: 'GET',
       data: { email: email},
       dataType: 'JSON',
       success: function(res){
           document.getElementById('res').innerHTML = res;
           if(res == 'Email Address is not available, try another one')
           {
              document.getElementById('regBtn').disabled = true;
              document.getElementById('res').style.color = 'red'; 
           }
           else {
              document.getElementById('regBtn').disabled = false;
              document.getElementById('res').style.color = 'green'; 
           }
       }
    });
}



</script>



@endsection