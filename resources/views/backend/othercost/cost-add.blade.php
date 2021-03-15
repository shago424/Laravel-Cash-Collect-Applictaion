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

            
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
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
          <section class="col-md-6 offset-md-3">
           
           <div class="card">
              <div class="card-header" style="background-color: #0A4833;color: white">
                <h5>

                  @if(isset($data))
              Edit Other Cost
              @else
              Add Other Cost
              @endif
                  <a style="font-size: 18px" href="{{route('accounts.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Other Cost List</i></a>
                </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{(@$data)?route('accounts.update',$data->id):route('accounts.store')}}" id="myform" enctype="multipart/form-data">
                @csrf
                <div class="form-row">

                  <div class="form-group col-md-12">
                    <label for="vendor">Vendor Name</label>
                    <select  name="vendor_id" class="form-control select2bs4" id="vendor_id">
                 <option value="">Select Vendor Name</option>
                @foreach($vendors as $vendor)
                 <option value="{{$vendor->id}}" {{(@$data->vendor_id==$vendor->id)?"selected":""}}>{{$vendor->vendor_name}}</option>
                @endforeach 
            </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="name">Cost Description</label>
                    <textarea name="descrip" id="descrip" class="form-control" placeholder="Enter Cost Description" rows="1" value="">{{@$data->descrip}}</textarea>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="name">Other Cost Date</label>
                    <input type="date" name="date" id="date" class="form-control" placeholder="Enter Date" value="{{@$data->date}}">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="name">Amount</label>
                    <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter Amount"value="{{@$data->amount}}">
                  </div>

                  
                
                  

                  <div class="form-group col-md-12">
                    <img id="showimage" src="{{(!empty(@$data->image))?url('upload/costimage/'.@$data->image):url('upload/usernoimage.png')}}"
                       alt="User News & Events picture" style="width: 120px;height: 140px;border:1px solid #000;">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" >
                  </div>

                <!--  <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control" placeholder="Not Applicable"readonly>
                  </div> -->
                    <div class="form-group col-md-12">
                    
                <input type="submit" value=" Submit Other Cost" name="submit" class="btn btn-danger float-right">
                  </div>
                </div> 
              </form>

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
  
<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      amount: {
      required: true,
        
      },

      descrip: {
      required: true,
        
      },
      vendor_id: {
        required: true,
        
      },
     
      date: {
        required: true,
        
      },
       
      buy_price: {
      required: true,
        
      },

      sell_price: {
      required: true,
        
      },
      special_price: {
        required: true,
        
      },
      special_start: {
        required: true,
        
      },
      special_end: {
        required: true,
        
      },
       
      product_name: {
      required: true,
        
      },

      thumbail: {
        required: true,
        
      },
      short_des: {
        required: true,
        
      },
       
      long_des: {
      required: true,
        
      },


      email: {
        required: true,
        email: true
       
      },
      password: {
        required: true, 
        minlength: 6
      },
      cpassword: {
      required: true,
      equalTo:'#password'
        
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
        
      },

      name: {
        required: "Please enter Name",
        
      },
      
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      },

      cpassword: {
        
        equalTo:"Confirm password Does Not Match",
        }
   
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
  @endsectionOther Cost