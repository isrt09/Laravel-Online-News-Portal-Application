<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$category = DB::table('categories')->get();
    	return view('Backend.Category.index',compact('category'));
    }

    public function store(Request $request)
    {
    	  $validatedData = $request->validate([
              'category_en' => 'required|unique:categories|max:55',
              'category_bn' => 'required|unique:categories|max:55',
           ]);

    	  $data=array();
    	  $data['category_en']=$request->category_en;
    	  $data['category_bn']=$request->category_bn;
    	  DB::table('categories')->insert($data);

    	     $notification=array(
                        'messege'=>'Successfully Added',
                        'alert-type'=>'success'
                         );
            return Redirect()->back()->with($notification);
    }

    public function delete($id)
    {
	      DB::table('categories')->where('id',$id)->delete();
    	  $notification=array(
        	   'messege'=>'Successfully Deleted',
           '	alert-type'=>'success'
          );
       return Redirect()->back()->with($notification);
    }

    public function edit($id)
    {    	
    	$category = DB::table('categories')->where('id',$id)->first();
    	return view('Backend.Category.edit',compact('category'));	
    }


    public function update(Request $request,$id)
    {
    	  $validatedData = $request->validate([
              'category_en' => 'required|max:15',
              'category_bn' => 'required|max:15',
           ]);

    	  $data=array();
    	  $data['category_en']=$request->category_en;
    	  $data['category_bn']=$request->category_bn;

	      DB::table('categories')->where('id',$id)->update($data);
    	  $notification=array(
        	   'messege'   =>'Successfully Updated',
               'alert-type'=>'success'
          );
       return Redirect()->route('category')->with($notification);
    }
}
