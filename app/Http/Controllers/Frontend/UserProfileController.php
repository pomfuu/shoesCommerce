<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index(){
        return view('front-end.profile');
    }

    public function updateProfile(Request $request){
        $request->validate([
            'email' => ['required'],
            'name' => ['required'],
            'image' => ['image']
        ]);

        $user = Auth::user();
        if($request->hasFile('image')){
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }

            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = 'uploads/'.$imageName;

            $user->image = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // toastr()->success('Profile Updated Successfully!');
        return redirect()->back();
    }
}
