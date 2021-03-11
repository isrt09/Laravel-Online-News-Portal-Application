@extends('layouts.app')
@section('content')
<div class="container">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">SubDistrict</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">SubDistrict</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
               <h4 class="modal-title">Update subdistrict</h4>
            </div>
            <div class="card-body">
                  <form action="{{ route('update.subdistrict',$subdistrict->id) }}" method="post">
                     @csrf
                       <div class="form-group">
                         <label for="name">SubDistrict Name (English) :</label>
                         <input type="text" class="form-control" name="subdistrict_en" value="{{ $subdistrict->subdistrict_en }}" required="">                                         
                       </div>
                       <div class="form-group">
                         <label for="name">SubDistrict Name (Bangla) :</label>
                         <input type="text" class="form-control" name="subdistrict_bn" value="{{ $subdistrict->subdistrict_en }}" required="">                                        
                       </div>
                       <div class="form-group">
                         <label for="name">District Name :</label>
                         <select name="district_id" id="" class="form-control">
                            <option value="" selected="">Choose District</option>                                        
                            @foreach ($district as $row)
                                <option value="{{ $row->id }}" <?php if($row->id == $subdistrict->district_id) echo "selected"; ?>>{{ $row->district_en }}</option>
                            @endforeach  
                         </select>
                       </div>                
                       <button type="submit" class="btn btn-success">Update SubDistrict</button>
                     </form>        
            </div>
         </div>
      </div>      
   </section>    
</div>  

@endsection