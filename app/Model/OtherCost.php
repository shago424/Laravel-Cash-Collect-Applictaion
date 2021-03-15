<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OtherCost extends Model
{
    public function vendor(){
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
      }
}
