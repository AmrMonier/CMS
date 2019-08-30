<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\changePasswordRequest;
use App\Http\Requests\updateUserInfoRequest;

class UserController extends Controller
{
    public function index()
    {
      return view('user.adminPanel')->with('users' , User::where('id','!=',Auth::user()->id)->paginate(5));
    }

    public function promoteAdmin(User $user)
    {
      $user->attachRole('admin');

      session()->flash('success', $user->email . ' promoted successfully');
      return redirect()->back();
    }

    public function viewSettings()
    {
        return view('user.settings')->with('user', Auth::user());
    }

    public function viewPassword()
    {
        return view('user.changePassword');
    }

    public function updatePassword(changePasswordRequest $request, User $user)
    {

      if (Hash::check($request->old_password, Auth::user()->password)) {
            if(Hash::check($request->password, Auth::user()->password)){
              session()->flash('error', 'New Password cannot be the same as the old password');
              return redirect()->back();
            }
            Auth::user()->update(['password' => Hash::make($request->password)]);
            session()->flash('success', 'Password changed successfully');
            return redirect(route('home'));
      }
      session()->flash('error', 'incorrect old Password');
      return redirect()->back();
    }

    public function updateInfo(updateUserInfoRequest $request, User $user)
    {
      if (Hash::check($request->password, Auth::user()->password)) {

        $data = $this->extractData($request);
        $user->update($data);
        session()->flash('success', 'User information updated successfully');
        return redirect(route('home'));
      }
      session()->flash('error', 'incorrect Password');
      return redirect()->back();


    }
    public function viewProfile(User $user){

        return view('user.profile')->with([
            'user'=> $user,
            'posts' => $user->posts()->simplePaginate(6),
        ]);
    }

    protected function extractData(Request $request){
      return [
        'name' => $request->name,
        'email' => $request->email,
        'bio' => $request->bio
      ];
    }
}
