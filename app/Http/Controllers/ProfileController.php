<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    // cutome method
   public function profile_photo_change(Request $request){
     $request->validate([

          'profile_photo'=>'required | mimes:jpg,jpeg,png'
     ]);
     if(auth()->user()->profile_photo){

        unlink( base_path('public/uploads/profile_photos/'.auth()->user()->profile_photo));

     }


        // photo upload start
         $generated_profile_photo_name = date('Y_m_d')."".time().Str::random(5).'.'.$request->file('profile_photo')->getClientOriginalExtension();
         Image::make($request->file('profile_photo'))->resize(200, 200)->save(base_path('public/uploads/profile_photos/'.$generated_profile_photo_name));
             // photo upload end

            //  database
           echo User::find(auth()->user()->id)->update([
            'profile_photo' =>$generated_profile_photo_name
           ]);

            return back()->with('success','New photo uploaded successfully!');

    }
}
