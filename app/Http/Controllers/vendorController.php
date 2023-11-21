<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class vendorController extends Controller

{
  public function register(){
    return view('vendor_register');
  }
  public function register_post(Request $request){

             $request->validate([
                '*'=> 'required',
                 'password'=> ['confirmed',Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
             ]);
            User::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
                 'created_at'=> Carbon::now(),
                 'deleted_at'=> Carbon::now(),
                 'role' => 'vendor'
            ]);
            return back()->with('success','your application send successfully! after approval you will receive a confirmation message');
  }
}
