<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }


    public function user(){
        return $this->belongsTo(User::class,'instructor_id','id');
    }


    public function payment(){
        return $this->belongsTo(Payment::class,'payment_id','id');
    }

    public function ins_about(){
        return $this->belongsTo(Aboutins::class,'instructor_id','instuctor_id');
    }






}
