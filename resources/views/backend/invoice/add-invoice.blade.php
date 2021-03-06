@extends('backend.layouts.master') 
@section('content') 
 
 
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid"> 
        <div class="row">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Invoice</li>
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
                <h5 style="color: white">Add Invoice
                  <a  href="{{route('invoices.view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Invoice List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:     #d9dad6   ">
                
            
   
  
   <div class="row"> 
  <div class="col-md-2">
    <div class="form-group"> 
        <label for="invoice_date" class="col-sm-12 control-label">Invoice Date <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
             <input type="date" name="invoice_date" class="form-control"    placeholder="YYYY-MM-DD" data-validation="requierd"   id="invoice_date">
            @error('invoice_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

     <div class="col-md-2">
   <div class="form-group">
        <label for="invoice_no" class="col-sm-12 control-label"> Invoice No <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-md-4">
          <input type="text"  name="invoice_no" class="form-control text-center" value="{{$invoice_no}}" id="invoice_no" data-validation="requierd" readonly style="background-color:  #d3de23 ">
          @error('invoice_no')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

    
       
   
  <div class="col-md-2">
   <div class="form-group">
        <label for="member_id" class="col-sm-12 control-label"> Member Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <select  name="member_id" class="form-control select2bs4" id="member_id">
          <option value="">Select Member</option>
                @foreach($members as $member)
                <option value="{{$member->id}}">{{$member->id}}---{{$member->member_name}}</option>
                @endforeach
            </select>
          @error('member_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    
   
  
  

 <div class="col-md-2">
    <div class="form-group">
        <label for="vendor_id" class="col-sm-12 control-label">Vendor Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
            <select name="vendor_id" class="form-control select2bs4" id="vendor_id">
                <option value="">Select Vendor Name</option>
                @foreach($vendors as $vendor)
                <option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
                @endforeach
            </select>
            @error('vendor_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

 

           
        <div class="col-sm-12">
            <a style="font-size: 14px;font-weight: bold;margin: 0;width: 150px"class="btn btn-danger btn-block pull-right"><i  style="font-size: 30px;color: white" class="fa fa-plus-circle addeventmore"> <strong style="color: white;font-size: 16px;margin: 0">Add More</strong></i></a>
        </div></i>
      
         </div>
</div>

<!-- Strat Card Body 2 -->

<div class="card-body"> 
  <form method="POST" action="{{route('invoices.store')}}" class="form-horizontal"enctype="multipart/form-data" id="myform">
    @csrf
    <table class="table table-bordered table-sm" width="100%">
      <thead>
        <tr>
          <th>Member Name</th>
          <th>Vendor Name</th>
          <th width="12%">Time</th>
          <th width="10%">Amount</th>
          <th width="12%">Subtotal</th>
          <th width="10%">Action</th>
        </tr>
      </thead>
      <tbody id="addrow" class="addrow">
        
      </tbody>
      <tbody>
       
        <tr>
         <td></td>
         <td></td>
          <td></td>
          <td></td>
           <td>
            <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly="" style="background-color: #D8FDBA">
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
<br>





    <div class="form-group">
        <div class="col-sm-12">
            <button style="font-size: 20px;font-weight: bold;" type="submit" class="btn btn-success btn-block pull-right" id="storebutton">Add Invoice</button>
        </div>
         </div>
      </form>
   </div>

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
<!-- store -->

<script type="text/x-handlebars-template" id="document-template">
<tr class="delete_add-more_item" id="delete_add-more_item">
    <input type="hidden" name="invoice_date" value="@{{invoice_date}}">
    <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
   

    <td>
         <input  type="hidden" name="member_id[]" value="@{{member_id}}">
         @{{member_name}}
      </td>
     <td>
         <input type="hidden" name="vendor_id[]" value="@{{vendor_id}}">
         @{{vendor_name}}

    </td>
  
   <td>
         <input type="number" min="1" name="selling_quantity[]" value="1" class="form-control form-control-sm text-center selling_quantity">
    </td>
     <td>
         <input type="text"  name="amount[]"  class="form-control form-control-sm text-center amount">
    </td>

     <td>
         <input type="text" name="selling_price[]" value="0.00" class="form-control form-control-sm text-right selling_price">
    </td>
     
    
     <td class="float-center">
         <i class="btn btn-danger  btn-sm fa fa-window-close removeeventmore"></i>
    </td>
  </tr>
</script>
<!-- add purchase -->
<script type="text/javascript">
  $(document).ready(function () {
  $(document).on("click",".addeventmore", function (){
    var invoice_date = $('#invoice_date').val();
    var invoice_no = $('#invoice_no').val();
    var member_id = $('#member_id').val();
    var member_name = $('#member_id').find('option:selected').text();
    var vendor_id = $('#vendor_id').val();
    var vendor_name = $('#vendor_id').find('option:selected').text();
    



    $('.notifyjs-corner').html('');

    if(invoice_date == ''){
      $.notify("Invoice Date Required",{globalPosition:'top right}',className:'error'}); 
      return false;
    }
     if(invoice_no == ''){
      $.notify("Invoice No Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
 
     if(member_id == ''){
      $.notify("Member Name Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
     if(vendor_id == ''){
      $.notify("Vendor Name Required",{globalPosition:'top right}',className:'error'});
      return false;
    }

   
     
      var source = $("#document-template").html();
      var template = Handlebars.compile(source);
      var data = {
        invoice_date:invoice_date,
        invoice_no:invoice_no,
        member_id:member_id,
        member_name:member_name,
        vendor_id:vendor_id,
        vendor_name:vendor_name
      };
      var html = template(data);
      $('#addrow').append(html);
      
  });

  $(document).on("click",".removeeventmore",function(event){
    $(this).closest(".delete_add-more_item").remove();
    totalAmountPrice();
  });


   $(document).on('keyup click','.amount,.selling_quantity',function(){
    var amount = $(this).closest("tr").find("input.amount").val();
    var qty = $(this).closest("tr").find("input.selling_quantity").val();
    var total = amount * qty;
    $(this).closest("tr").find("input.selling_price").val(total);
    totalAmountPrice();
  });

 
    function totalAmountPrice(){
      var sum =0;
      $(".selling_price").each(function(){
        var value = $(this).val();
        if(!isNaN(value) && value.length != 0){
          sum += parseFloat(value);
        }
      });
     
      $('#estimated_amount').val(sum);
    }
});
</script>
  <!-- dropdown category -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#supplier_id',function(){
      var supplier_id =$('#supplier_id').val();

      $.ajax({
        url:"{{route('get-category')}}",
        type:"GET",
        data:{supplier_id:supplier_id},
        success:function(data){
          var html = '<option value="">Select Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.category_id+'">'+v.category.item_name+'</option>';
          });
          $('#category_id').html(html);
        }

      });
    });
  });
</script>

 <!-- dropdown sub category -->
  
<script type="text/javascript">
  $(function(){
    $(document).on('change','#category_id',function(){
      var category_id =$('#category_id').val();

      $.ajax({
        url:"{{route('get-subcategory')}}",
        type:"GET",
        data:{category_id:category_id},
        success:function(data){
          var html = '<option value="">Select Sub Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.sub_category_id+'">'+v.subcategory.item_name+'</option>';
          });
          $('#sub_category_id').html(html);
        }

      });
    });
  });
</script>

 <!-- dropdown sub sub category -->
  
<script type="text/javascript">
  $(function(){
    $(document).on('change','#sub_category_id',function(){
      var sub_category_id =$('#sub_category_id').val();

      $.ajax({
        url:"{{route('get-subsubcategory')}}",
        type:"GET",
        data:{sub_category_id:sub_category_id},
        success:function(data){
          var html = '<option value="">Select Sub Sub Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.sub_sub_category_id+'">'+v.subsubcategory.item_name+'</option>';
          });
          $('#sub_sub_category_id').html(html);
        }

      });
    });
  });
</script>

<!-- dropdown brand -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#sub_sub_category_id',function(){
      var sub_sub_category_id =$('#sub_sub_category_id').val();

      $.ajax({
        url:"{{route('get-brand')}}",
        type:"GET",
        data:{sub_sub_category_id:sub_sub_category_id},
        success:function(data){
          var html = '<option value="">Select Brand</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.brand_id+'">'+v.brand.item_name+'</option>';
          });
          $('#brand_id').html(html);
        }

      });
    });
  });
</script>

<!-- dropdown productname -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#brand_id',function(){
      var brand_id =$('#brand_id').val();

      $.ajax({
        url:"{{route('get-productname')}}",
        type:"GET",
        data:{brand_id:brand_id},
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

<!-- dropdown unit -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-unit')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#unit_id').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown model -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-model')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
         $('#model').val(data);
        }

      });
    });
  });
</script>
<!-- dropdown size -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-size')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
          $('#size').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown color -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-color')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
         $('#color').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown product code -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-product-code')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
         $('#product_code').val(data);
        
        }

      });
    });
  });
</script>


<!-- dropdown stock -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-warranty-time')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#warranty_time').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown stock -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-stock')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#stock_quantity').val(data);
        }

      });
    });
  });
</script>

<!-- End dropdown  -->

<!-- paid status  -->
<script type="text/javascript">
  $(document).on('change','#paid_status', function(){
    var paid_status = $(this).val();
    if(paid_status == 'some_paid'){
      $('.paid_amount').show();
    }else{
       $('.paid_amount').hide();
    }
  });
</script>
<!-- customer  -->
<script type="text/javascript">
  $(document).on('change','#customer_id', function(){
    var customer_id = $(this).val();
    if(customer_id == '0'){
      $('.new_customer').show();
    }else{
       $('.new_customer').hide();
    }
  });
</script>



<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      selling_quantity: {
      required: true,
        
      },

      category_id: {
      required: true,
        
      },
     
      selling_price: {
      required: true,
        
      },

      sell_price: {
      required: true,
        
      },
      unit_price: {
        required: true,
        
      },
      invoice_date: {
        required: true,
        
      },
      product_code: {
        required: true,
        
      },

       paid_status: {
        required: true,
        
      },
       
      product_id: {
      required: true,
        
      },
        supplier_id: {
        required: true,
        
      },
      warranty_time: {
        required: true,
        
      },
      unit_id: {
        required: true,
        
      },
       
      purchase_code: {
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

 <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  @endsection
