<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
use App\Http\Requests\ContactpostRequest;
class fron_endController extends Controller
{
    //
    function index()
    {
        echo view('index');
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
