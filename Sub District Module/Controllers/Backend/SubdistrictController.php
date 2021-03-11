<?php

namespace App\Http\Controllers\Backend;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubdistrictController extends Controller
{
    public function index(){
    	$subdistrict = DB::table('subdistricts')
    				   ->join('districts','subdistricts.district_id','districts.id')
    				   ->select('districts.district_en','subdistricts.*')->get();    				   
    	$district    = DB::table('districts')->get();
    	return view('Backend.SubDistrict.index',compact('district','subdistrict'));
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
              'subdistrict_en' => 'required|unique:subdistricts|max:15',
              'subdistrict_bn' => 'required|unique:subdistricts|max:15',
              'district_id'    => 'required'
        ]);

    	$data=array();
    	  $data['subdistrict_en']=$request->subdistrict_en;
    	  $data['subdistrict_bn']=$request->subdistrict_bn;
    	  $data['district_id']   =$request->district_id;
    	  DB::table('subdistricts')->insert($data);

	     $notification=array(
            'messege'=>'Successfully SubDistrict Added',
            'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

    public function delete($id){
        DB::table('subdistricts')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully SubDistrict Deleted!',
            'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

    public function edit($id){
        $subdistrict = DB::table('subdistricts')->where('id',$id)->first();
        $district    = DB::table('districts')->get();
        return view('Backend.SubDistrict.edit',compact('district','subdistrict'));        
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
              'subdistrict_en' => 'required|unique:subdistricts|max:15',
              'subdistrict_bn' => 'required|unique:subdistricts|max:15',
              'district_id'    => 'required'
        ]);

        $data=array();
          $data['subdistrict_en']=$request->subdistrict_en;
          $data['subdistrict_bn']=$request->subdistrict_bn;
          $data['district_id']   =$request->district_id;
          DB::table('subdistricts')->where('id',$id)->update($data);

         $notification=array(
            'messege'=>'Successfully SubDistrict Updated',
            'alert-type'=>'success'
         );
        return Redirect()->route('subdistrict')->with($notification);
    }
}
