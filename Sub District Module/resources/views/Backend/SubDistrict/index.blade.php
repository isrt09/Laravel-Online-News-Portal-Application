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
               <a href="" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#modal-default">Add New</a>
            </div>
            <div class="card-body">
               <table id="example1" class="table table-bordered table-hover">
                <thead>
                   <tr>
                     <th>ID</th>
                     <th>SubDistrict Name (English)</th>
                     <th>SubDistrict Name (Bangla)</th>
                     <th>District Name</th>
                     <th>Action Status</th>            
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($subdistrict as $row)
                   <tr>
                     <td>{{ $row->id }}</td>
                     <td>{{ $row->subdistrict_en }}</td>
                     <td>{{ $row->subdistrict_bn }}</td>                     
                     <td>{{ $row->district_en }}</td>                     
                     <td>
                        <a href="{{ route('edit.subdistrict',  $row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</a>
                        <a href="{{ route('delete.subdistrict',$row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i> Delete</a>                        
                     </td>
                  </tr>
                  @endforeach               
                  </tbody>              
            </div>
         </div>
      </div>
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Insert subdistrict</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">
              <form action="{{ route('store.subdistrict') }}" method="post">
               @csrf
                 <div class="form-group">
                   <label for="name">SubDistrict Name (English) :</label>
                   <input type="text" class="form-control @error('subdistrict_en') is-invalid @enderror" name="subdistrict_en" value="{{ old('subdistrict_en') }}"> 
                    @error('subdistrict_en')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                    @enderror                  
                 </div>
                 <div class="form-group">
                   <label for="name">SubDistrict Name (Bangla) :</label>
                   <input type="text" class="form-control @error('subdistrict_bn') is-invalid @enderror" name="subdistrict_bn" value="{{ old('subdistrict_bn') }}">
                    @error('subdistrict_bn')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                    @enderror                 
                 </div>
                 <div class="form-group">
                   <label for="name">District Name :</label>
                   <select name="district_id" id="" class="form-control">
                      <option value="" selected="">Choose District</option>                                        
                      @foreach ($district as $row)
                          <option value="{{ $row->id }}">{{ $row->district_en }}</option>
                      @endforeach  
                   </select>
                 </div>                
                 <button type="submit" class="btn btn-success">Save SubDistrict</button>
               </form>
            </div>            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
   </section>    
</div>  

@endsection