@extends('backend.layouts.master')
@section('content')
  

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
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Other Cost</li>
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
          <!-- Left col -->
          <section class="col-md-12">
           
           <div class="card">
              <div class="card-header" style="background-color: #0A4833;color: white">
                <h5>Add Other List
                  <a style="font-size: 18px"  href="{{route('accounts.add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-user"> Add Other Cost</i></a>
                </h5>
              </div>
            <div class="card-body">
                <table id="example1" class=" table-sm table table-bordered table-hover">
                  <thead>
                  <tr style="background-color:  #f4d03f ;color: black">
                    <th>SL</th>
                    <th>ID No</th>
                    <th>Cost Date</th>
                    <th>Vendor Name</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Total Amount</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $value)
                    <tr class="{{$value->id}}">
                    <td style="text-align: center">{{$key+1}}</td>
                    <td style="text-align: center">{{$value->id}}</td>
                   
                    <td style="text-align: center">{{date('d-M-Y',strtotime($value->date))}}</td>
                     <td style="text-align: center">{{$value['vendor']['vendor_name']}}</td>
                      <td style="text-align: center">{{$value->descrip}}</td> 
                    <td style="text-align: center">{{$value->amount}}</td>
                    <td style="text-align: center">{{$value->sum('amount')}}</td>
                   {{--  <td style="text-align: center;"><img style="width: 50px;height: 60px" class="profile-value-img img-fluid"
                       src="{{(!empty($value->image))?url('public/upload/costimage/'.$value->image):url('public/upload/usernoimage.png')}}"
                       alt="value profile picture"></td>
                      <td> --}}
                        <td>
                    <a title="Edit" href="{{route('accounts.edit',$value->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('accounts.delete',$value->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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