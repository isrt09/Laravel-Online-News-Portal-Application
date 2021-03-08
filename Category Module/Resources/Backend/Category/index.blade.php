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
               <a href="" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#modal-default">Add New</a>
            </div>
            <div class="card-body">
               <table id="example1" class="table table-bordered table-hover">
                <thead>
                   <tr>
                     <th>ID</th>
                     <th>Category Name (English)</th>
                     <th>Category Name (Bangla)</th>
                     <th>Action Status</th>            
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($category as $row)
                   <tr>
                     <td>{{ $row->id }}</td>
                     <td>{{ $row->category_en }}</td>
                     <td>{{ $row->category_bn }}</td>                     
                     <td>
                        <a href="{{ URL::to('edit_category/'.$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</a>
                        <a href="{{ route('delete.category',$row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i> Delete</a>                        
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
              <h4 class="modal-title">Insert Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">
              <form action="{{ route('store.category') }}" method="post">
               @csrf
                 <div class="form-group">
                   <label for="name">Category Name (English) :</label>
                   <input type="text" class="form-control @error('category_en') is-invalid @enderror" name="category_en" value="{{ old('category_en') }}" autocomplete="category_en" autofocus placeholder="Enter Category Name English ...."> 
                    @error('category_en')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                    @enderror                  
                 </div>
                 <div class="form-group">
                   <label for="name">Category Name (Bangla) :</label>
                   <input type="text" class="form-control @error('category_bn') is-invalid @enderror" name="category_bn" value="{{ old('category_bn') }}" autocomplete="category_bn" autofocus placeholder="Enter Category Name Bangla ....">
                    @error('category_bn')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                    @enderror                 
                 </div>                
                 <button type="submit" class="btn btn-success">Save Category</button>
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