@extends('admin.master')

@section('title')
Manage Blog
@endsection

@section('body')
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Category Name</th>
                                <th>Blog Title</th>
                                <th>Blog Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($blogs as $blog)
                            <tr class="odd gradeX">
                                <td>{{$i++}}</td>
                                <td>{{$blog->category_name}}</td>
                                <td>{{$blog->blog_title}}</td>
                                <td><img src="{{asset($blog->blog_image)}}" alt='' title="" style="height: 100px; width: 100px"></td>
                                <td>{{$blog->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td>
                                    <a href="{{route('edit-blog',['id' => $blog->id])}}">Edit</a>
                                    <a href="#" 
                                       onclick="event.preventDefault();
                                                    var check = confirm('Are you sure to delete ?');
                                                    if(check) {
                                                     document.getElementById('deleteBlogForm' + '{{$blog->id}}').submit();   
                                                    }"  
                                       class="btn-link">Delete
                                    
                                    </a>
                                    <form id="deleteBlogForm{{$blog->id}}" action="{{route('delete-blog')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$blog->id}}" />
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection