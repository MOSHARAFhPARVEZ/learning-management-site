<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Wishlist extends Model
{
    use HasFactory;
    protected $guarded =[];

    // course rel with wishlist
    public function course(){
        return $this->belongsTo(Course::class , 'course_id' , 'id');
    }
}
