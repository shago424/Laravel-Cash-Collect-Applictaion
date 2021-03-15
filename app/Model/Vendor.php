<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'vendor_name', 'father_name', 'address', 'mobile','image','status','created_by','updated_by',
    ];
}
