<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    
    
    public  function  show(){
        $categories = Category::orderBy('name','desc')->get();

        return view("category",['categories'=>$categories]);

    }
    public  function  add(Request $request){
        
             $request->validate(
            [
            'name' => 'required|max:150',
           
            ],
        [


            'name.required' => 'Please Provied name',
           
            

           
        ]
    
    
    
    );
        $category=new Category;

        $category->name=$request->name;
    
        $category->parent_id=$request->parentid;
       
        $category->save();

        return back();
      

    }
}
