<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$subcategory = DB::table('subcategories')
    					->join('categories','subcategories.category_id','categories.id')
    					->select('categories.category_en','subcategories.*')->get();
    					
    	$category    = DB::table('categories')->get();
    	return view('Backend.SubCategory.index',compact('category','subcategory'));
    }
    
    public function store(Request $request)
    {
    	  $validatedData = $request->validate([
              'subcategory_en' => 'required|unique:subcategories|max:55',
              'subcategory_bn' => 'required|unique:subcategories|max:55',
              'category_id'    => 'required'
           ]);

    	  $data=array();
    	  $data['subcategory_en'] = $request->subcategory_en;
    	  $data['subcategory_bn'] = $request->subcategory_bn;
    	  $data['category_id']    = $request->category_id;
    	  DB::table('subcategories')->insert($data);
    	     $notification=array(
                'messege'=>'Successfully Added',
                'alert-type'=>'success'
             );
          return Redirect()->back()->with($notification);
    }
	
	
    public function delete($id)
    {
	      DB::table('subcategories')->where('id',$id)->delete();
    	  $notification=array(
        	   'messege'    =>'Successfully Deleted',
               'alert-type' =>'success'
          );
       return Redirect()->back()->with($notification);
    }

	
    public function edit($id)
    {    	
    	$subcategory = DB::table('subcategories')->where('id',$id)->first();
    	$category    = DB::table('categories')->get();
    	return view('Backend.SubCategory.edit',compact('subcategory', 'category'));	
    }

	
    public function update(Request $request,$id)
    {
    	  $validatedData = $request->validate([
              'subcategory_en' => 'required|unique:subcategories|max:55',
              'subcategory_bn' => 'required|unique:subcategories|max:55',
              'category_id'    => 'required'
           ]);

    	  $data=array();
    	  $data['subcategory_en'] = $request->subcategory_en;
    	  $data['subcategory_bn'] = $request->subcategory_bn;
    	  $data['category_id']    = $request->category_id;
    	  
	      DB::table('subcategories')->where('id',$id)->update($data);
    	  $notification=array(
        	   'messege'   =>'Successfully Updated',
               'alert-type'=>'success'
          );
        return Redirect()->route('subcategory')->with($notification);
    }
}
