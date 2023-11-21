<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\NotifyAdmin;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AddminContorller extends Controller
{
    public function add_new_admin()
    {
       $admins =  User::withTrashed()->where('role', 'admin')->get();
        echo view('backend.admin.add_new_admin',compact('admins'));
    }


    public function add_new_admin_post(Request $request)
    {

       $myPass = (Str::upper(Str::random(8)));
        User::insert([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($myPass),
            'created_at' => Carbon::now(),
            'role' => 'admin'
        ]);
        //    email start



        // Mail::to($request->user())->send(new OrderShipped($order));
        // return new NotifyAdmin($request->email,$myPass);
        Mail::to($request->email)->send(new NotifyAdmin($request->email,$myPass));
             return back()->with('success','message send successfully');
        //    email end
    }
    function deactive_admin ($id){
        User::find($id)->delete();
        return back();
    }
     function active_admin ($id){
      User::withTrashed()->where('id',$id)->restore();
      return back();
    }
}
