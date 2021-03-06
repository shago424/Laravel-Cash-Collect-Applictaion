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
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">View Invoice Details</li>
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
              <div class="card-header" style="background-color:   #f1c40f  ">
                <h5>Invoice No :<strong> {{$invoice->invoice_no}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invoice Date: <strong>{{date('d-m-Y',strtotime($invoice->invoice_date))}}</strong>
                  <a  href="{{route('invoices.pending-list')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"><strong style="font-size: 18px"> Invoice Pending List</strong></i></a>
               
               
                </h5>
              </div> 
            <div class="card-body">
                                    
              
                <br>
               <form method="post" action="{{route('invoices.approve-store',$invoice->id)}}">
                @csrf
                 <table width="100%" class="table table-bordered table-sm" style="margin-bottom: 15px;">
                  <thead>
                    <tr>
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
                    {{--  @php
                   $total_sum = '0';
                   @endphp --}}
                   @foreach($invoice['invoicedetails'] as $key => $invoicedetail)
                  
                    <tr>
                       <input type="hidden" name="member_id[]" value="{{$invoicedetail->member_id}}">
                      <input type="hidden" name="amount[{{$invoicedetail->id}}]" value="{{$invoicedetail->amount}}">
                      <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{$invoicedetail->invoice_id}}</td>
                      <td style="text-align: center;">{{$invoicedetail['invoice']['invoice_no']}}</td>
                      <td>{{date('d-m-Y',strtotime($invoice->invoice_date))}}</td>
                       <td>{{$invoicedetail['vendor']['vendor_name']}}</td>
                       <td>{{$invoicedetail['member']['member_name']}}</td>
                      <td style="text-align: right;">{{$invoicedetail->amount}}</td>
                      
                    </tr>

                 {{--   @php
                   $total_sum += $invoicedetail->selling_price;
                   @endphp --}}
                    @endforeach
                  
                    
                   
                     <tr>
                      <th style="text-align: right;" colspan="6">Total Amount</th>
                      <td style="text-align: right;background-color: #D8FDBA">{{$invoice->total_amount}}</td>
                    </tr>
                    
                   
                  </tbody>
                </table>
                <button id="approve" type="submit" class="btn btn-danger float-right">Invoice Approve Store</button>
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
   <!-- modal -->


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div style="background: gray" class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-hover table-sm">
                <tr>
                  <th width="50%">Invoice ID</th>
                  <td width="50%">gfgf</td>
                </tr>
              </table>
            </div>
            <div style="background: gray" class="modal-footer float-right">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  @endsection