<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function instuctor(){
        return $this->belongsTo(User::class,'instuctor_id','id');
    }


    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
