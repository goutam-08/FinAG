<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{
    public function settingsFunc()
    {
        $data=User::where('id', Auth::user()->id)->first();
      

        return view('settings', compact('data'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile_num = $request->mobile_num;
        $user->dob = $request->dob;
        $user->address = $request->address;


        // Profile Image Upload
        if ($request->hasFile('profile_img')) {

            // Old image delete
            if ($user->profile_img && File::exists(public_path($user->profile_img))) {
                File::delete(public_path($user->profile_img));
            }

            $file = $request->file('profile_img');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/profile'), $filename);

            $user->profile_img = 'uploads/profile/' . $filename;
        }


        $user->save();

        return back()->with(
            'success',
            'Profile Updated Successfully'
        );
    }
}
