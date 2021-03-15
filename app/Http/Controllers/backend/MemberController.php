<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Member;
use Auth;
use App\User;
use App\Model\InvoiceDetail;
use App\Model\Invoice;
use App\Model\Vendor;
use PDF;
class MemberController extends Controller
{
     public function view(){
     $members = Member::get();
    	return view('backend.member.view-member',compact('members'));
    }

    public function add(){
    	return view('backend.member.add-member'); 
    }

    
     public function store(Request $request){
      
    	$data = new member();
      $data->member_name = $request->member_name;
    	$data->father_name = $request->father_name;
    	$data->seat_no = $request->seat_no;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->created_by = Auth::user()->id;


         if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/memberimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();

    	return redirect()->route('members.view')->with('success','Data Inserted Successfully');
    }


     public function edit($id){
     $editdata = Member::find($id);
    	return view('backend.member.add-member',compact('editdata'));
    }

      public function update(Request $request , $id){

        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'required',
        //     'mobile'=>'required',
        //     'address'=>'required',
       
        // ]);

      	$data = Member::find($id);
      $data->member_name = $request->member_name;
    	$data->father_name = $request->father_name;
    	$data->seat_no = $request->seat_no;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->created_by = Auth::user()->id;
    	
         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/memberimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/memberimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();

    	return redirect()->route('members.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
            $member = Member::find($id);
            $member->delete();
           return redirect()->route('members.view')->with('success','member Deleted Successfully');

          }  


          public function creditcustomer(){
     $data = Payment::whereIn('paid_status',['full_due','some_paid'])->get();
      return view('backend.customer.credit-customer',compact('data'));
    }  

     public function creditcustomerpdf(){
     $data['alldata'] = Payment::whereIn('paid_status',['full_due','some_paid'])->get();
      $pdf = PDF::loadView('backend.pdf.credit-customer-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('customer-credit-report.pdf');
    }

     public function paidcustomer(){
     $data = Payment::whereIn('paid_status',['full_paid'])->get();
      return view('backend.customer.paid-customer',compact('data'));
    }  

     public function paidcustomerpdf(){
     $data['alldata'] = Payment::whereIn('paid_status',['full_paid'])->get();
      $pdf = PDF::loadView('backend.pdf.paid-customer-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('customer-paid-report.pdf');
    }




    public function invoicecustomeredit($invoice_id){
      $payment = Payment::where('invoice_id',$invoice_id)->first();
       $invoicedetails = InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
      return view('backend.customer.edit-customer-invoice',compact('payment','invoicedetails'));
    } 


     public function invoicecustomerupdate(Request $request,$invoice_id){

      if($request->new_paid_amount < $request->paid_amount){
        return redirect()->back()->with('error', 'Sorry! you have paid maximum value');
      }else{
         $payment = Payment::where('invoice_id',$invoice_id)->first();
         $payment_details = new PaymentDetail();
         $payment->paid_status = $request->paid_status;
         if($request->paid_status == 'full_paid'){
          $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
          $payment->due_amount = '0';
          $payment_details->current_paid_amount = $request->new_paid_amount;
         }elseif ($request->paid_status == 'some_paid') {
            $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
            $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()['due_amount']-$request->paid_amount;
            $payment_details->current_paid_amount = $request->paid_amount;
         
          }
         $payment->save();
         $payment_details->invoice_id = $invoice_id;
         $payment_details->payment_date = date('Y-m-d',strtotime($request->payment_date));
         $payment_details->updated_by = Auth::user()->id;
         $payment_details->save();
       
     
      return redirect()->route('customers.credit')->with('success','Customer Invoice Payment Update Successfully');
      }

    }
     
    public function invoicecustomerdetailspdf($invoice_id){
     $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
      $pdf = PDF::loadView('backend.pdf.all-credit-customer-details-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('customer-credit-report.pdf');
    }


     public function invoicecPaidustomerdetailspdf($invoice_id){
     $data['payment'] = Payment::where('invoice_id',$invoice_id)->first();
      $pdf = PDF::loadView('backend.pdf.all-paid-customer-details-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('customer-credit-report.pdf');
    }


     public function memberwisereportview(Request $request){
    $data['members'] = Member::all();
    $data['vendors'] = Vendor::all();
    $data['alldata'] = InvoiceDetail::where('member_id',$request->member_id)->get();
    // $data['alldata'] = InvoiceDetail::where('vendor_id',$request->vendor_id)->get();
    return view('backend.member.member-wise-report',$data);
    }


      public function memberwisereport(Request $request){
         $data['members'] = Member::all();
    $data['vendors'] = Vendor::all();
      $data['alldata'] = InvoiceDetail::where('member_id',$request->member_id)->get();
       return view('backend.member.member-wise-report',$data);
      // $pdf = PDF::loadView('backend.pdf.member-wise-report-pdf',$data);
      //   $pdf->SetProtection(['copy','print'],'','pass');
      //   return $pdf->stream('member-wise-report.pdf');
      
    }


    public function memberwisereportpdf(Request $request){
         $data['members'] = Member::all();
    $data['vendors'] = Vendor::all();
      $data['alldata'] = InvoiceDetail::where('member_id',$request->member_id)->get();
      $pdf = PDF::loadView('backend.pdf.member-wise-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('member-wise-report.pdf');
      
    }


     public function vendorwiseport(Request $request){
       $data['alldata'] = InvoiceDetail::where('vendor_id',$request->vendor_id)->get();
           $data['members'] = Member::all();
    $data['vendors'] = Vendor::all();
    return view('backend.member.member-wise-report',$data);
      // $pdf = PDF::loadView('backend.pdf.vendor-wise-report-pdf',$data);
      //   $pdf->SetProtection(['copy','print'],'','pass');
      //   return $pdf->stream('vendor-wise-report.pdf');
      
    }


      public function vendorwiseportpdf(Request $request){
       $data['alldata'] = InvoiceDetail::where('vendor_id',$request->vendor_id)->get();
           $data['members'] = Member::all();
           $data['vendors'] = Vendor::all();
    
      $pdf = PDF::loadView('backend.pdf.vendor-wise-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('vendor-wise-report.pdf');
      
    }

     public function customerwisepaidreport(Request $request){
       $data['alldata'] = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_paid'])->get();
      $pdf = PDF::loadView('backend.pdf.customer-wise-paid-report-pdf',$data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('supplier-by-stock-report.pdf');
      
    }
}
