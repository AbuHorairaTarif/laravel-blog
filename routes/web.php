<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/404', 'ErrorHandleController@error404');

Route::get('/405', 'ErrorHandleController@error405');

Route::get('/',[
   'uses' => 'LaravelBlogController@index',
    'as'   => '/'
]);

Route::get('/category-blog/{id}',[
    'uses' => 'LaravelBlogController@categoryBlog',
    'as'    => 'category-blog'
]);

Route::get('/blog-details/{id}',[
    'uses' => 'LaravelBlogController@blogDetails',
    'as'    => 'blog-detail'
]);

Route::get('/sign-up',[
   'uses' => 'SignUpController@index',
    'as'   => 'sign-up'
]);

Route::post('/new-sign-up',[
   'uses' => 'SignUpController@newSignUp',
    'as'   => 'new-sign-up'
]);

Route::post('/visitorLogout',[
   'uses' => 'SignUpController@visitorLogout',
    'as'   => 'visitor-logout'
]);

Route::get('/visitor-sign-in-form',[
   'uses' => 'SignUpController@visitorSignInForm',
    'as'   => 'visitor-sign-in-form'
]);

Route::post('/visitor-sign-in',[
   'uses' => 'SignUpController@visitorSignIn',
    'as'   => 'visitor-sign-in'
]);

Route::get('/email-check/{email}',[
   'uses' => 'SignUpController@emailCheck',
    'as'   => 'email-check'
]);

Route::post('/new-comment',[
   'uses' => 'CommentController@newComment',
    'as'   => 'new-comment'
]);




///////////////////// Admin Dashboard////////////////////


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => ['superadmin']], function(){
 Route::get('/home',[
   'uses' => 'HomeController@index',
    'as'    => 'home'
 ]);    
 
 Route::get('/home/add-category',[
   'uses' => 'CategoryController@addCategory',
    'as'   => 'add-category'
]);

Route::post('/home/new-category',[
   'uses' => 'CategoryController@newCategory',
    'as'   => 'new-category'
]);

Route::get('/home/manage-category',[
   'uses' => 'CategoryController@manageCategory',
    'as'   => 'manage-category'
]);

Route::get('/home/edit-category/{id}',[
   'uses' => 'CategoryController@editCategory',
    'as'   => 'edit-category'
]);

Route::post('/home/update-category',[
   'uses' => 'CategoryController@updateCategory',
    'as'   => 'update-category'
]);

Route::post('/home/delete-category',[
   'uses' => 'CategoryController@deleteCategory',
    'as'   => 'delete-category'
]);

Route::get('/home/add-blog',[
   'uses' => 'BlogController@addBlog',
    'as'   => 'add-blog'
]);

Route::post('/home/new-blog',[
   'uses' => 'BlogController@newBlog',
    'as'   => 'new-blog'
]);

Route::get('/home/manage-blog',[
   'uses' => 'BlogController@manageBlog',
    'as'   => 'manage-blog'
]);

Route::get('/home/edit-blog/{id}',[
   'uses' => 'BlogController@editBlog',
    'as'   => 'edit-blog'
]);

Route::post('/home/update-blog',[
   'uses' => 'BlogController@updateBlog',
    'as'   => 'update-blog'
]);

Route::post('/home/delete-blog',[
   'uses' => 'BlogController@deleteBlog',
    'as'   => 'delete-blog'
]);

Route::get('/manage-comment',[
   'uses' => 'BlogController@manageComment',
    'as'   => 'manage-comment'
]);

Route::get('/unpublished-comment/{id}',[
   'uses' => 'BlogController@unpublishedComment',
    'as'   => 'unpublished-comment'
]);

Route::get('/published-comment/{id}',[
   'uses' => 'BlogController@publishedComment',
    'as'   => 'published-comment'
]);
});

