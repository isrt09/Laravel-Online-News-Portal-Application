@extends('layouts.app')
@section('content')
<div class="container">
   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0 text-dark">Category</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Category</li>
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
               <div class="card-title"><h3>Update Category</h3></div>
            </div>
            <div class="card-body">                    
            <div class="modal-body">
              <form action="{{ route('update.category',$category->id) }}" method="post">
               @csrf
                 <div class="form-group">
                   <label for="name">Category Name (English) :</label>
                   <input type="text" class="form-control" name="category_en" value="{{ $category->category_en}}" required="">                                   
                 </div>
                 <div class="form-group">
                   <label for="name">Category Name (Bangla) :</label>
                   <input type="text" class="form-control" name="category_bn" value="{{ $category->category_bn}}" required="">                                
                 </div>                
                 <button type="submit" class="btn btn-success">Update Category</button>
               </form>
            </div>            
            </div>
         </div>
      </div>     
   </section>    
</div>  

@endsection