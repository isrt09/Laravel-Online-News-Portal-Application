<?php

namespace App\Http\Controllers\Backend;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    public function __construct(){    
        $this->middleware('auth');
    }

    public function index(){
    	$district = DB::table('districts')->get();
    	return view('Backend.District.index',compact('district'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
              'district_en' => 'required|unique:districts|max:15',
              'district_bn' => 'required|unique:districts|max:15',
        ]);

    	$data=array();
    	  $data['district_en']=$request->district_en;
    	  $data['district_bn']=$request->district_bn;
    	  DB::table('districts')->insert($data);

	     $notification=array(
            'messege'=>'Successfully District Added',
            'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

    public function delete($id){
    	DB::table('districts')->where('id',$id)->delete();
    	$notification=array(
            'messege'=>'Successfully District Deleted!',
            'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

    public function edit($id){
    	$district = DB::table('districts')->where('id',$id)->first();    	
        return view('Backend.District.edit',compact('district'));
    }

    public function update(Request $request, $id){
    	$validatedData = $request->validate([
              'district_en' => 'required|unique:districts|max:15',
              'district_bn' => 'required|unique:districts|max:15',              
        ]);

    	$data=array();
    	  $data['district_en']=$request->district_en;
    	  $data['district_bn']=$request->district_bn;
    	  $data['district_id']=$request->district_id;
    	  DB::table('districts')->where('id',$id)->update($data);

	     $notification=array(
            'messege'=>'Successfully District Updated',
            'alert-type'=>'success'
         );
        return Redirect()->route('district')->with($notification);
    }
}
