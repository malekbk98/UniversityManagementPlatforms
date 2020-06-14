<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {   
        $user = auth::user();
       //dd($user);
      return view ('profile',compact ('user'));

    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,user $user)
    {
        $data = $request->validate($this->validationRules());
        if($request->new_password!=null){
            $data['password'] = Hash::make($data['new_password']);
        }else{
            $data['password'] = Hash::make($data['password']);
        }
        $update = User::findOrFail($data['id']);
        $update->email=$data['email'];
        $update->password=$data['password'];
        $update->save();
        return redirect('home');
}

    private function validationRules()
    {
        return [
            'id' => 'string|required',
            'email' => 'email|required',
            'password' => ['required', new MatchOldPassword],
            'new_password' => '',
            'confirm_password' => ['same:new_password'],
        ];
    }
    
}
