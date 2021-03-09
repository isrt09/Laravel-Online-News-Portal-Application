@extends('layouts.app')
@section('content')
<div class="container">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">SubCategory</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">SubCategory</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- Main content -->
   <section class="content">
        <div class="card-header">
           <div class="card-title">
               <h3>Update SubCategory</h3>
           </div>
        </div>
        <div class="card-body">
            <form action="{{ route('update.subcategory',$subcategory->id) }}" method="post">
               @csrf
                 <div class="form-group">
                   <label for="name">SubCategory Name (English) :</label>
                   <input type="text" class="form-control" name="subcategory_en" required="" value="{{ $subcategory->subcategory_en }}">                                   
                 </div>
                 <div class="form-group">
                   <label for="name">SubCategory Name (Bangla) :</label>
                   <input type="text" class="form-control" name="subcategory_bn" required="" value="{{ $subcategory->subcategory_bn }}">                                  
                 </div>
                  <div class="form-group">
                   <label for="name">Category ID :</label>
                   <select name="category_id" class="form-control">                    
                     <option value="" selected="">Select category</option>
                     @foreach ($category as $row)
                       <option value="{{ $row->id }}" <?php if($row->id == $subcategory->category_id) echo "selected"; ?>>{{ $row->category_en }}</option>
                     @endforeach                     
                   </select>
                    @error('subcategory_bn')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                    @enderror                 
                 </div>                     
                 <button type="submit" class="btn btn-success">Update SubCategory</button>
               </form>        
        </div>
   </section>    
</div>  

@endsection