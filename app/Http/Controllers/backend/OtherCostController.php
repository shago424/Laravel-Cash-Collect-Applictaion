<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OtherCost;
use App\User;
use Auth;
use App\Model\Vendor;

class OtherCostController extends Controller
{
    public function view(){
    	$data['alldata'] = OtherCost::orderBy('id','desc')->get();
    	return view('backend.othercost.cost-view',$data);
    }

    public function add(){
      $vendors =Vendor::all();
    return view('backend.othercost.cost-add',compact('vendors'));

    }
    	 public function store(Request $request){
     		$cost = new OtherCost();
     		$cost->date = date('y-m-d',strtotime($request->date));
    		$cost->amount = $request->amount;
    		$cost->descrip = $request->descrip;
        $cost->vendor_id = $request->vendor_id;
        $cost->dabit_all_amount = $request->amount +$cost->amount ;
    		$cost->created_by = Auth::user()->id;
    		

    		if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/costimage'), $filename);
          $cost['image'] = $filename;
        }
    	$cost->save();
    	return redirect()->route('accounts.view')->with('success','Other Cost Inserted Successfully');

     }  

     public function edit($id){
            $data['data'] = OtherCost::find($id);
            $data['vendors'] =Vendor::all();
            return view('backend.othercost.cost-add',$data);

        }


		public function update(Request $request,$id){
            $cost = OtherCost::find($id);
            $cost->date = date('y-m-d',strtotime($request->date));
    		$cost->amount = $request->amount;
    		$cost->descrip = $request->descrip;
         $cost->vendor_id = $request->vendor_id;
         $cost->dabit_all_amount = $request->amount +$cost->amount ;
            $cost->updated_by = Auth::user()->id;

         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/costimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/costimage'), $filename);
          $cost['image'] = $filename;
        }
        $cost->save();

        return redirect()->route('accounts.view')->with('success','Other Cost Updated Successfully');
 
        }

     public function delete($id){
            $cost = OtherCost::find($id);

          if (file_exists('public/upload/costimage/' . $cost->image) AND !
            empty($cost->image)){
               unlink('public/upload/costimage/' . $cost->image);
       }
            $cost->delete();
            return redirect()->route('accounts.view')->with('success','Other Cost Deleted Successfully');

          }  
}
