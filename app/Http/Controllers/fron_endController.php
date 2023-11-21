<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
use App\Http\Requests\ContactpostRequest;
use App\Models\Product;
use App\Models\Product_photo;
use App\Models\User;

class fron_endController extends Controller
{
    //
    function index()
    {
      $products =  Product::latest()->take(8)->get();
        echo view('index',compact('products'));
    }
    function product_details($id)
    {
        $product= Product::findOrFail($id);
        $vendor =  User::find($product->user_id);
       return view('product_details',[
        'product'=>  $product,
        'product_photos'=>Product_photo::where('product_id',$id)->get(),
         'vendor'=>$vendor
       ]);
    }
    function about()
    {

        $contacts = Contact::latest()->get();

        echo view('about', compact('contacts') );


        // way -2

        // echo view('about',[
        //     'names'=> $names,
        //     'towns'=> $towns,
        // ]);

        // way -3

        //  echo view('about')->with([
        //     'names'=> $names,
        //     'towns'=> $towns,
        //  ]);

    }

    function contact()
    {
        echo view('contact');
    }
    function contact_post(ContactpostRequest $request)
    {

        // form validation

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' =>  Carbon::now(),

        ]);
        return back()->with('success', 'message send successfully!');
    }
}
