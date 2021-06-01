<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(){
        $orders = Order::all();

        return view('profile')->with([
            'user' => Auth::user(),
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        
        //user avatar update
        $image_name = $request->image_name;
        $avatar = $request->file('avatar');
        //file upload
        if ($request->hasFile('avatar')) {
            
            $image_name = rand() .'.'.$avatar->getClientOriginalExtension();
            $avatar->move('Images/users', $image_name);

            $user =Auth::user();
            $user->avatar ='users/'.$image_name;
            $user->save();

        }
        if ($request->status) {
            # code...
            $user =Auth::user();
            $user->status = $request->status;
        }

        $user = auth()->user();
        $input = $request->except('password', 'confirm_password');
        
        //password update
        if(! $request->filled('password')){
           $user->fill($input)->save();
           return back()->with('success', 'profile save !');
        }
        //encrypting the password
        $user->password = bcrypt($request->password);
        $user->fill($input)->save();

        toastr()->success('Profile was update successfully .!');

        return back()->with([
            'success'=> 'profile (and password) save !'
        ]);
    }
    
}
