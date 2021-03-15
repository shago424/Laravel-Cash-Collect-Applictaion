<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title>Individual Vendor All Invoice Repoet</title>
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
             
                
              </div> 
            </td>
          </tr>
        </table>
        
        <div style="font-size: 18px;margin-top: 7px;font-weight: bold;text-align: center;"><u ><i>Individual Vendor All Invoice Repoet</i></u></div>
           <br>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
           
            <div class="card-body">
                                   
                <table width="100%" class="table table-bordered table-sm" border="1" >
                  <tbody>
                    <tr><th colspan="3" class="text-center" style="font-size: 20px">Vendor Information</th></tr>
                    <tr>
                      <th >Vendor Name</th>
                      <th >Mobile</th>
                      <th width="50%" >Address</th>
                    </tr>
                     <tr>
                     <td >{{$alldata['0']['vendor']['vendor_name']}}</td>
                      <td  style="text-align: center;">{{$alldata['0']['vendor']['mobile']}}</td>
                      <td >{{$alldata['0']['vendor']['address']}}</td> 
                    </tr>
                  </tbody>
                </table>
                <br>
               
                 <table width="100%" border="1" class="table table-bordered table-sm" style="margin-bottom: 15px;padding-bottom: 0">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th width="10%">Invoice ID</th>
                      <th>Invoice No</th>
                      <th>Invoice Date</th>
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
                      <td >{{$details['member']['member_name']}}</td>
                   
                      <td style="text-align: right;">{{$details->amount}}</td>
                    </tr>

                   @php
                   $total_sum += $details->amount;
                   @endphp
                    @endforeach
                    <tr>
                      <th style="text-align: right;" colspan="5">Grand Total</th>
                      <td style="text-align: right;">{{$total_sum}}.00</td>
                    </tr>
                  </tbody>
                </table>

              
                 @php
                $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'))
                @endphp
                
                <i style="font-size: 10px;margin-top: -10px">Print Date: {{$date->format('j F, Y, g:i a')}}</i>
                <br>
                 <br>
                 <br>
            <table width="100%">
          <tr>
            <td style="text-align: center;border-top: solid " width="25%">Member Signature</td>
            <td style="text-align: center;" width="50%"></td>
            <td style="text-align: center;border-top: solid 1px;" width="25%">Accountant Signature</td>
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