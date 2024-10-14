<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    use HasFactory;
    protected $guarded =[];

     public function blogcate(){
        return $this->belongsTo(BlogCategory::class,'blogcat_id','id');
    }
}
