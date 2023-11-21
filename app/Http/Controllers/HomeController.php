<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard (){

        if(auth()->user()->role == 'admin'){

      $applied_vendors = User::onlyTrashed()->where('role' , 'vendor')->get();
      $users =  User::withTrashed()->get();
        return view('dashboard.admin',compact('applied_vendors','users'));

        }else if (auth()->user()->role == 'vendor'){
            return view('dashboard.vendor');
        }
         else{
            return view('dashboard.customer');
        }



    }
    public function vendor_approve ($id){

      User::onlyTrashed()->where('id', $id)->restore();
      return back();
    }
}
