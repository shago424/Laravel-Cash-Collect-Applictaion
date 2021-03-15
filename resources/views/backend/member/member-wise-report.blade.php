@extends('backend.layouts.master') 
@section('content') 
 
 
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Member Wise Report</li>
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

          <section class="col-md-12 offset-md-0">
           
           <div class="card">
              <div class="card-header" style="background-color: #086A87 ">
                <h5 style="color: white">Member Wise Report
                  <a  href="{{route('invoices.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Invoice List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:">
             <div class="row">
              <br> <div class="text-center pt-1 pb-1 col-md-12 " style="text-align: center;font-weight: bold;font-size: 20px;background-color: lightgreen">View Report</div>
               <div class="col-md-12 text-center pt-3 pb-3">
                 <strong style="color: green">Member Invoice Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="member_wise" value="product_wise" class="search_value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong style="color: green">Vendor Wise Invoice Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="member_wise" value="credit_wise" class="search_value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
               </div>
               <br>

<br> <div class="text-center pt-1 pb-1 col-md-12" style="text-align: center;font-weight: bold;font-size: 20px;background-color: lightgreen">PDF Search</div>
<br>
              <div class="col-md-12 text-center pt-3">
                 <strong style="color: green">Member Invoice Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="pdf_wise" value="product_wise1" class="search_value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <strong style="color: green">Vendor Wise Invoice Report</strong>&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="pdf_wise" value="credit_wise2" class="search_value">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
               </div>



             </div>

             <div class="show_product_wise" style="display: none;">
               <form action="{{ route('members.wise-report') }}" method="GET" id="productwise" >
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Member Name</label>
                     <select name="member_id" class="form-control select2bs4">
                      <option value="">Select member</option>
                         @foreach($members as $member)
                        <option value="{{$member->id}}">{{$member->member_name}} --- {{$member->mobile}}----{{$member->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">View Report</button>
                   </div>
                 </div>
               </form>
             </div>

             <div class="show_credit_wise" style="display: none;">
               <form action="{{ route('members.vendor-wise-report') }}" method="GET" id="creditwise" >
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Vendor Name</label>
                     <select name="vendor_id" class="form-control select2bs4">
                      <option value="">Select Vendor</option>
                         @foreach($vendors as $vendor)
                        <option value="{{$vendor->id}}">{{$vendor->vendor_name}}--- {{$vendor->mobile}}----{{$vendor->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">View Report</button>
                   </div>
                 </div>
               </form>
             </div>


             <hr>
             <div class="show_product_wise1" style="display: none;">
               <form action="{{ route('members.wise-report-pdf') }}" method="GET" id="productwise1" target="_blank" >
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Member Name</label>
                     <select name="member_id" class="form-control select2bs4">
                      <option value="">Select member</option>
                         @foreach($members as $member)
                        <option value="{{$member->id}}">{{$member->member_name}} --- {{$member->mobile}}----{{$member->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">PDF Report</button>
                   </div>
                 </div>
               </form>
             </div>

             <div class="show_credit_wise2" style="display: none;">
               <form action="{{ route('members.vendor-wise-report-pdf') }}" method="GET" id="creditwise1" target="_blank">
                 <div class="form-row">
                   <div class="col-sm-8">
                     <label>Vendor Name</label>
                     <select name="vendor_id" class="form-control select2bs4">
                      <option value="">Select Vendor</option>
                         @foreach($vendors as $vendor)
                        <option value="{{$vendor->id}}">{{$vendor->vendor_name}}--- {{$vendor->mobile}}----{{$vendor->address}}</option>
                        @endforeach 
                     </select>
                   </div>
                   <div class="col-sm-4" style="margin-top: 30px">
                     <button type="submit" class="btn btn-success ">PDF Report</button>
                   </div>
                 </div>
               </form>
             </div>

         

            

            
   
  
</div>

<!-- Strat Card Body 2 -->


              </div>


        
        <div style="font-size: 18px;margin-top: 7px;font-weight: bold;text-align: center;"><u ><i>Individual All Invoice Repoet</i></u></div>
           <br>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
           
            <div class="card-body">
                                   
               
                <br>
              
             
                 <table id="example1" class="table table-bordered table-sm">
                   <thead>
                    <tr style="background-color: lightgreen">
                      <th>SL.</th>
                      <th>Invoice ID</th>
                      <th>Invoice No</th>
                      <th>Invoice Date</th>
                      <th>Vendor Name</th>
                      <th>Member Name</th>
                      <th>Amount</th>
                    </tr> 
                  </thead>
                  <tbody>
                     @php
                   $total_sum = '0';
                  
                   @endphp
                   @foreach($alldata as $key => $details)
                    <tr>
                     <td style="text-align: center;">{{$key+1}}</td>
                     <td style="text-align: center;">{{$details->invoice_id}}</td>
                     <td style="text-align: center;">{{$details['invoice']['invoice_no']}}</td>
                     <td style="text-align: center;">{{date('d-m-Y',strtotime($details->invoice_date))}}</td>
                      <td >{{$details['vendor']['vendor_name']}}</td>
                      <td >{{$details['member']['member_name']}}</td>
                   
                      <td style="text-align: right;">{{$details->amount}}</td>
                    </tr>

                   @php
                   $total_sum += $details->amount;
                   @endphp
                    @endforeach
                  </tbody>
                   <tr>
                      <th style="text-align: right;" colspan="6">Grand Total</th>
                      <td style="text-align: right;">{{$total_sum}}.00</td>
                    </tr>
                 </table>
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
<!-- store -->

<!-- dropdown productname -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#category_id',function(){
      var category_id =$('#category_id').val();

      $.ajax({
        url:"{{route('get-product')}}",
        type:"GET",
        data:{category_id:category_id},
        success:function(data){
          var html = '<option value="">Select Product Name</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.id+'">'+v.product_name+'</option>';
          });
          $('#product_id').html(html);
        }

      });
    });
  });
</script>


  <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

     <script>
        $('#datepicker1').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'product_wise'){
      $('.show_product_wise').show();
    }else{
       $('.show_product_wise').hide();
    }
  });
</script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'credit_wise'){
      $('.show_credit_wise').show();
    }else{
       $('.show_credit_wise').hide();
    }
  });
</script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'product_wise1'){
      $('.show_product_wise1').show();
    }else{
       $('.show_product_wise1').hide();
    }
  });
</script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'credit_wise2'){
      $('.show_credit_wise2').show();
    }else{
       $('.show_credit_wise2').hide();
    }
  });
</script>

<script type="text/javascript">
  $(document).on('change','.search_value',function(){
    var search_value = $(this).val();
    if(search_value == 'paid_wise'){
      $('.show_paid_wise').show();
    }else{
       $('.show_paid_wise').hide();
    }
  });
</script>

<script>
$(function () {
  
  $('#productwise').validate({
    rules: {

    
      member_id: {
      required: true,
        
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

<script>
$(function () {
  
  $('#creditwise').validate({
    rules: {

    
      category_id: {
      required: true,
        
      },

      product_id: {
      required: true,
        
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
<script>
$(function () {
  
  $('#paidwise').validate({
    rules: {

    
      member_id: {
      required: true,
        
      },

      product_id: {
      required: true,
        
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
