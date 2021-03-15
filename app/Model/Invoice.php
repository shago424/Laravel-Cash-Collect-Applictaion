<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function member(){
      	return $this->belongsTo(Member::class, 'id', 'invoice_id');
      }

      public function vendor(){
        return $this->belongsTo(Vendor::class, 'id', 'invoice_id');
      }



      public function invoicedetails(){
        return $this->hasmany(InvoiceDetail::class, 'invoice_id', 'id');
      }

 }  
