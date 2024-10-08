<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActiveuserController extends Controller
{


    public function AdminUserView(){

        $users = User::where('role','user')->latest()->get();

        return view('admin.backend.userinstuctor.userview',compact('users'));
    } //end method


    public function AdminInstuctorView(){

        $instuctors = User::where('role','instuctor')->latest()->get();

        return view('admin.backend.userinstuctor.instuctorview',compact('instuctors'));
    } //end method




}
