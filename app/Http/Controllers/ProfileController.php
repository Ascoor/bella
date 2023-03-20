<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $id = Auth::id();
        if ($user->profile == null) {
            $profile = Profile::create([
                'nickname' => 'maneger',
                'user_id' => $user->id,

                'postion' => 'admin',

            ]);
        }
        return view('profile.edit')->with('user', $user);
    }

    public function update(Request $request)
    {

        $this->validate($request, [

            'nickname' => 'required',

            'postion'       => 'required'
        ]);



        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->gender = $request->nagendere;
        $user->profile->nickname = $request->nickname;

        $user->profile->postion = $request->postion;
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/users/' . $filename);
            Image::make($image)->resize(300, 300)->save($location);
            $user->photo = $filename; // set the "photo" attribute directly on the model
        } else {
            // set default image if no photo is uploaded
            $user->photo = 'akram.jpg'; // set the "photo" attribute directly on the model
        }



        $user->profile->save();
        $user->save();
        auth()->user()->update($request->all());




        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return back()->withStatus(__('Profile successfully updated.'));
    }
}
