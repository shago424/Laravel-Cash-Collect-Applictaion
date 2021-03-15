<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    
      public function vendor(){
      	return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
      }

      public function member(){
        return $this->belongsTo(Member::class, 'member_id', 'id');
      }


       public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
      }

     


     
}
