@extends('layouts.app')
@section('content')
<div class="container">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">District</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">District</li>
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
               <div class="card-title"><h4 class="text-center">Update District</h4></div>
            </div>
            <div class="card-body">
                  <form action="{{ route('update.district',$district->id) }}" method="post">
                     @csrf
                       <div class="form-group">
                         <label for="name">District Name (English) :</label>
                         <input type="text" class="form-control" name="district_en" value="{{ $district->district_en }}" required=""> 
                          @error('district_en')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                          @enderror                  
                       </div>
                       <div class="form-group">
                         <label for="name">District Name (Bangla) :</label>
                         <input type="text" class="form-control" name="district_bn" value="{{ $district->district_bn }}" required="">
                          @error('district_bn')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                          @enderror                 
                       </div>                
                       <button type="submit" class="btn btn-success">Update District</button>
                  </form>           
            </div>
         </div>
      </div>      
   </section>    
</div>  

@endsection