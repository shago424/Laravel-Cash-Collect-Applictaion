@extends('backend.layouts.master')
@section('content')  
<style type="text/css">
  .btn-primary:hover{
   background: green;
   border-radius: 25px;
   color: #fff;
  }
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Vendor</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
<section class="col-md-12 offset-md-0">
           
          
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
         
          <!-- Left col -->
          <section class="col-md-12">
           
           <div class="card">
            <div class="card-header" style="background-color: #0A4833;color: white">
                <h5>Vendor List
                  <a style="font-size: 18px"  href="{{route('vendors.add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-user"> Add Vendor</i></a>
                </h5>
              </div>
            <div  class="card-body">
                <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Vendor Name</th>
                    <th>Father Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($vendors as $key => $vendor)
            <tr style="background-color:  #bfc9ca  ;border: 2px">
                      <td>{{$key+1}}</td>
                      <td>{{$vendor->id}}</td>
                      <td>{{$vendor->vendor_name}}</td>
                      <td>{{$vendor->father_name}}</td>
                      <td>{{$vendor->mobile}}</td>
                      <td>{{$vendor->address}}</td>
                      <td><img style="width: 50px;height: 60px" class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($vendor->image))?url('upload/vendorimage/'.$vendor->image):url('upload/usernoimage.png')}}"
                       alt="User profile picture"></td>
                     {{--   @php
                       $count_vendor = App\Model\Vendor::where('vendor_id',$vendor->id)->count();
                       @endphp --}}
                      <td>
                    <a title="Edit" href="{{route('vendors.edit',$vendor->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                  
                    <a title="Delete" id="delete" href="{{route('vendors.delete',$vendor->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                  
                      </td> 
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection