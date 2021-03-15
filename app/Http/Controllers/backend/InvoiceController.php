<?php  
 
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Auth;    
use DB;  
use App\User; 
use Session;
use App\Model\Member;
use App\Model\Vendor;

use App\Model\Invoice;
use App\Model\InvoiceDetail; 
use App\Model\Payment;
use App\Model\PaymentDetail;
use App\Model\Customer;
use App\Model\OtherCost;
use PDF;
use Illuminate\Support\Str;



class InvoiceController extends Controller
{
   public function view(){
	$data = InvoiceDetail::all();
    
    return view('backend.invoice.view-invoice',compact('data'));
    }

     public function allreport(){
    $total_amount = InvoiceDetail::all();
    $total_dabit= OtherCost::all();
     $member= Member::all();
    return view('backend.invoice.all-report',compact('total_amount','total_dabit','member'));
    }

     public function allinvoicedetaillview(){
    $data = InvoiceDetail::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->where('status','1')->get();
    
    return view('backend.invoice.view-all-invoice-details',compact('data'));
    }


   
    public function add(){
        $data['members'] = Member::where('status',1)->orderby('id','ASC')->get();
    	$data['vendors'] = Vendor::where('status',1)->orderby('id','ASC')->get();

        $invoice_data = Invoice::orderby('id','desc')->first();
        if($invoice_data == null){
            $firstReg = '1000';
            $data['invoice_no'] = $firstReg+1;
        }else{
            $invoice_data = Invoice::orderby('id','desc')->first()->invoice_no;
            $data['invoice_no'] = $invoice_data+1;
        }
         $data['date'] = date('Y-m-d');
    	return view('backend.invoice.add-invoice',$data);
    }

    public function store(Request $request){ 
 
    if($request->member_id == null){
        return redirect()->back()->with('error','Sorry! you do not select any item');

    }else{
      

     $invoice = new Invoice();
     $invoice->invoice_no = $request->invoice_no;
     $invoice->invoice_date = date('Y-m-d',strtotime($request->invoice_date));
     $invoice->total_amount = $request->estimated_amount;
     $invoice->status = '0';
     $invoice->created_by = Auth::user()->id;
     
     DB::transaction(function() use($request,$invoice){
        if($invoice->save()){
            $count_member = count($request->member_id);
        for ($i=0; $i < $count_member; $i++){



     $invoice_details = new InvoiceDetail();
     $invoice_details->invoice_date = date('Y-m-d',strtotime($request->invoice_date));
     $invoice_details->invoice_id = $invoice->id;
     $invoice_details->member_id = $request->member_id[$i];
     $invoice_details->vendor_id = $request->vendor_id[$i];
     $invoice_details->amount = $request->amount[$i];
     $invoice_details->status= '0';
     $invoice_details->save();


        }
        
        }
        
     });      
    }

      return redirect()->route('invoices.pending-list')->with('success','Invoice Created Successfully');

    }

          public function delete($id){
            $invoice = Invoice::find($id);
            $invoice->delete();
            InvoiceDetail::where('invoice_id',$invoice->id)->delete();
            Payment::where('invoice_id',$invoice->id)->delete();
            PaymentDetail::where('invoice_id',$invoice->id)->delete();
            return redirect()->route('invoices.view')->with('success','Invoice Deleted Successfully');

          } 
          
//      public function inactive($id){
//             $invoice = Invoice::find($id);
//             $invoice->status = 0;
//             $invoice->save();

//            Session::flash('success','Invoice Inactive Successfully!');

//     	return back();

//         }
// public function active($id){
//             $invoice = Invoice::find($id);
//             $invoice->status = 1;
//             $invoice->save();

//            Session::flash('success','Invoice Active Successfully!');
//     	return back();
//         } 


    public function pendinglist(){
   $data = Invoice::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->where('status','0')->get();
    return view('backend.invoice.pending-list',compact('data'));
    }


  public function allview($id){
        $invoice = Invoice::with(['invoicedetails'])->find($id);
         return view('backend.invoice.show-alldata',compact('invoice'));
    }

    public function approve($id){
        $invoice = Invoice::with(['invoicedetails'])->find($id);
         return view('backend.invoice.approve-view',compact('invoice'));
    }


public function customerinvoice($id){
        $data['invoice'] = Invoice::with(['invoicedetails'])->find($id);
        $pdf = PDF::loadView('backend.pdf.invoice-customer-pdf',$data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('customer-invoice.pdf');

    }
    public function approvestore(Request $request, $id){
           

            $invoice = Invoice::find($id);
            $invoice->approved_by =Auth::user()->id;
            $invoice->status = '1';
            DB::transaction(function() use ($request, $invoice, $id){
                 foreach ($request->amount as $key => $value) {
               $invoice_details = InvoiceDetail::where('id',$key)->first();
               $invoice_details->status = '1';
               $invoice_details->save();
               $member = Member::where('id',$invoice_details->member_id)->first();
               $member->total_amount = ((float)($member->total_amount))+((float)$request->amount[$key]);
               $member->save();

           }

            $invoice->save();
            });
           
      return redirect()->route('invoices.view')->with('success','Invoice Approved Successfully');

   } 


     public function dailyview(Request $request){
       $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = InvoiceDetail::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
       
         return view('backend.invoice.daily-view',$data);
    }


    public function dailyreportpdf(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = InvoiceDetail::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
         $pdf = PDF::loadView('backend.pdf.daily-invoice-report-pdf',$data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('daily-invoice-report.pdf');

     }

      public function dailyreport(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = InvoiceDetail::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
        return view('backend.invoice.daily-view',$data);

     }

}
