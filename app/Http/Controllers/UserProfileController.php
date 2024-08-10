<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\Category;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules;


use Illuminate\Support\Facades\Hash;


class UserProfileController extends Controller
{
    public function userprofile()
    {
        if(!auth()->user()){
            $itemsincart = 0;
        }
        else
       {
        $itemsincart = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();

       }
       $categories = Category::orderBy('priority')->get();
       return view('userprofile',compact('categories','itemsincart'));
    }


    public function edit( Request $id)
    {

        
        if(!auth()->user()){
            $itemsincart = 0;
        }
        else
       {
        $itemsincart = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();

       }
       $categories = Category::orderBy('priority')->get();
       $user = User::find($id);
        
        return view('usereditprofile', compact('categories','itemsincart','user'));
    
    }


// public function update(Request $request, $id)
// {
//     $data = $request->validate([
//         'name' => 'required',
//         'email'=>  'required',
//         'address' => 'required',
//         'phone' => 'required',
//         'photopath' => 'required|image|mimes:jpg,jpeg,png',
//         'password' => ['required', 'confirmed', Rules\Password::defaults()],

//     ]);
//     $data['password'] = Hash::make($data['password']);


//     if($request->hasFile('photopath')){
//         $image =$request->file('photopath');
//         $name = time().'.'.$image->getClientOriginalExtension();
//         $destinationPath = public_path('/images/user');
//         $image->move($destinationPath,$name);
        
//         $data['photopath'] = $name;
//     }

//     $user = User::find($id);
//     $user->update($data);
    

//     return redirect(route('userprofile'));
// }




    public function update(Request $request,$id)
    {
      



        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'photopath'=>'nullable'
        ]);

    

        if ($request->hasFile('photopath')) {
            $image = $request->file('photopath');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/user');
            $image->move($destinationPath, $name);

            $data['photopath'] = $name;
        }

        $user = User::find($id);
        $user->update($data);

        return redirect(route('user.userprofile'));
    }
}





