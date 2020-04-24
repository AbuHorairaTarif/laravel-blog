<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add-category');
    }
    
    public function checkCategoryData($request)
    {
        $this->validate($request, [
            'category_name' => 'required | regex:/(^([a-zA-z _]+)(\d+)?$)/u| min:3 | max:50',
            'category_description' => 'required'
        ]);
    }
    
    public function newCategory(Request $request){
        $this->checkCategoryData($request);
        Category::saveCategoryInfo($request);
        
        return redirect('/home/add-category')
                            ->with('message','Category Saved Successfully');
    }
    
    public function manageCategory(){
        return view('admin.category.manage-category',[
            'categories'    => Category::all()
        ]);
    }
    
    public function editCategory($id){
        return view('admin.category.edit-category',[
           'category'       => Category::find($id)
        ]);
    }
    
    public function updateCategory(Request $request){
        Category::updateCategoryInfo($request);
        
        return redirect('/home/manage-category')
                        ->with('message','Category Updated Successfully');
    }
    
    public function deleteCategory(Request $request){
        $blog = Blog::where('category_id',$request->id)->first();
        if($blog){
            return redirect('/home/manage-category')
                        ->with('message','Category Deletion Not Possible as you have some blogs');
        }
        else {
        Category::deleteCategoryInfo($request);
        return redirect('/home/manage-category')
                        ->with('message','Category Deleted Successfully');    
        }       
    }
    
}