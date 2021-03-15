<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title> Date By Invoice Report</title>
  </head>
  <body>
        <table width="100%" style="border:solid;" >
          <tr>
            <td style="text-align: center;" width="20%">
              <img src="upload/usernoimage.png" style="border-radius: 50%;height: 80px;width: 80px">
            </td>
            <td style="text-align: center;padding-left: 10px;" width="50%">
              <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sherpur Tours & Travels</h2>
              <h3 style="padding-top: 3px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sherpur, Bogura</h3>
              <h4 style="padding-top: 3px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile : 01712411894</h4>
            </td>
            <td style="text-align: right;" width="30%">
               <div class="card-header" style="">
                <strong><u>Date By Invoice Report</u></strong>
                Start Date : {{date('d-m-Y',strtotime($start_date))}}<strong> &nbsp;&nbsp;</strong> 
                <br>
               End Date : {{date('d-m-Y',strtotime($end_date))}} <strong >&nbsp;&nbsp;</strong>
                
              </div> 
            </td>
          </tr>
        </table>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
            <br>
            <div class="card-body">
                                   
               
               <table width="100%" border="1" id="example1" class="table table-bordered table-sm">
                  
                <thead>
                   <tr style="background-color: lightgreen;">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Invoice No</th>
                    <th>Invoice Date</th>
                    <th>Vendor Name</th>
                    <th>Member Name</th>
                    <th>Amount</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                     @php
                  $total_total_sum = '0';
               
                  @endphp
                   @foreach($alldata as $key => $invoice)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$invoice->invoice_id}}</td>
                <td style="text-align: center;">{{$invoice['invoice']['invoice_no']}}</td>
                 <td style="text-align: center;">{{date('d-m-y',strtotime($invoice->invoice_date))}}</td>
                 <td>{{$invoice['vendor']['vendor_name']}}</td>
                <td>{{$invoice['member']['member_name']}}</td>
                
                <td style="text-align: right;">{{$invoice->amount}}</td>
              </tr>

               @php
                $total_total_sum += $invoice->amount;
               
                @endphp
               @endforeach 
                  </tbody>
                    <tr>
                      <td colspan="6" align="right">Total Amount </td>
                      <td style="background-color: lightgreen;text-align: right;">{{$total_total_sum}}.00</td>
                     
                    </tr>
                </table>


                 @php
                $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'))
                @endphp
                
                <i style="font-size: 12px;margin-top: -10px">Print Date: {{$date->format('j F, Y, g:i a')}}</i>
                <br>
                 <br>
                 <br>
            <table width="100%">
          <tr>
            <td width="25%"></td>
            <td style="text-align: center;" width="50%"></td>
            <td style="text-align: center;border-top: solid 1px;" width="25%">Owner Signature</td>
          </tr>
        </table>
                

                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
 
   
  </body>
</html>