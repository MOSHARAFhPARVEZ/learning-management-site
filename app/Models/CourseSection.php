<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseLecture;

class CourseSection extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function lectures(){
        return $this->hasMany(CourseLecture::class,'secation_id');
    }
}
