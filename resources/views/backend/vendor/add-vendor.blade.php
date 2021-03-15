 @extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Vendor</li>
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
              @if(isset($editdata))
              Edit Vendor
              @else
              Add Vendor
              @endif
                  <a style="font-size: 18px"  href="{{route('vendors.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> View Vendor</i></a>
                </h5>
              </div>
            <div class="card-body">
                
              <form method="post" action="{{(@$editdata)?route('vendors.update',$editdata->id):route('vendors.store')}}" id="myform" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="vendor_name">Vendor Name</label>
                    <input type="text" name="vendor_name" id="vendor_name" class="form-control" placeholder="Enter Vendor Name" value="{{@$editdata->vendor_name}}">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="father_name">Father Name</label>
                    <input type="text" name="father_name" id="father_name" class="form-control" placeholder="Enter father_name" value="{{@$editdata->father_name}}">
                    <font style="color:red">{{($errors)->has('father_name')?($errors->first('father_name')):''}}</font>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number" value="{{@$editdata->mobile}}">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address " value="{{@$editdata->address}}">
                  </div>

                   <div class="form-group col-md-6">
                    <img id="showimage" src="{{(!empty($editdata->image))?url('upload/vendorimage/'.$editdata->image):url('upload/usernoimage.png')}}"
                       alt="User profile picture" style="width: 120px;height: 140px;border:1px solid #000;">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" >
                  </div>

                 <div class="form-group col-md-12">
                <input style="font-weight: bold;font-size: 18px" type="submit" value=" {{(@$editdata)?'Update Vendor':'Add Vendor '}}" name="submit" class="btn btn-primary btn-block " >
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

    
      vendor_name: {
      required: true,
        
      },

      address: {
      required: true,
        
      },
      mobile: {
        required: true,
        
      },
     
      brand_id: {
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
  @endsection