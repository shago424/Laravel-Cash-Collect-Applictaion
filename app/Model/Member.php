<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'member_name', 'father_name', 'address', 'mobile','image','status','created_by','updated_by','seat_no','amount',
    ];
}
