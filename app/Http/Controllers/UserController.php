<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function profile(){
        return view('pages.profile', array('user' => Auth::user()));
    }

    public function update_logo(Request $request){

        if ($request->hasFile('logo')){
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(300, 300)->save( public_path('/uploads/logos/' . $filename) );

            $user = Auth::user();
            $user->logo = $filename;
            $user->save();
        }
        flash('Your logo has been changed')->success();
        return redirect()->back();
    }

    public function edit(Request $request){

        $name = $request->input('name');
        $localisation = $request->input('localisation');
        $telephone = $request->input('telephone');

        $user = Auth::user();
        if(isset($name)){
            $user->name = $name;
        }
        if(isset($localisation)){
            $user->localisation = $localisation;
        }
        if(isset($telephone)){
            $user->telephone = $telephone;
        }
        $user->save();

        flash('Your profile has been updated')->success();
        return redirect()->back();
    }

    public function change_Password(Request $request){
        $password = $request->input('password');

        Auth::user()->update([
            'password' =>  Hash::make($password),
        ]);

        flash('Your password has been changed')->success();
        return redirect()->back();

    }
}
