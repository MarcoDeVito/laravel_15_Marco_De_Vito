<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function profile(){
    return view('pages.profile');
   }
   public function home(){
    return view('pages.homepage');
   }
   public function showUser($user){
    
       
    $user= User::where('name', $user )->first();
       if(!$user){
        abort(404);
       }
       
    
    return view('articles.user', compact('user'));
   }
   public function update_profile(UpdateProfileRequest $request)
   {
      

       $user = User::where('id', auth()->user()->id)->first();

       $user->update(['name' => $request->name]);

       return redirect()->route('pages.profile');
   }
}
