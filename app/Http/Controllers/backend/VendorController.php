<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Vendor;
use Auth;
use App\User;

class VendorController extends Controller
{
    public function view(){
     $vendors = Vendor::get();
    	return view('backend.vendor.view-vendor',compact('vendors'));
    }

    public function add(){
    	return view('backend.vendor.add-vendor');
    }

    
     public function store(Request $request){
      
    	$data = new vendor();
      $data->vendor_name = $request->vendor_name;
    	$data->father_name = $request->father_name;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->created_by = Auth::user()->id;


         if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/vendorimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();

    	return redirect()->route('vendors.view')->with('success','Data Inserted Successfully');
    }


     public function edit($id){
     $editdata = Vendor::find($id);
    	return view('backend.vendor.add-vendor',compact('editdata'));
    }

      public function update(Request $request , $id){

        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'required',
        //     'mobile'=>'required',
        //     'address'=>'required',
       
        // ]);

      	$data = Vendor::find($id);
        $data->vendor_name = $request->vendor_name;
    	$data->father_name = $request->father_name;
    	$data->mobile = $request->mobile;
    	$data->address = $request->address;
    	$data->created_by = Auth::user()->id;


         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/vendorimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/vendorimage'), $filename);
          $data['image'] = $filename;
        }
    	$data->save();

    	return redirect()->route('vendors.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
            $vendor = Vendor::find($id);
            $vendor->delete();
           return redirect()->route('vendors.view')->with('success','vendor Deleted Successfully');

          }  
}
