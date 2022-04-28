<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function create()
  {
      return view('users.create');
  }

  public function store(Request $request)
  {
    $data = $request->validate([
        'first_name'=>'required|string',
        'last_name'=>'required|string',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|string',
        'dob'=>'required',
        'gender'=>'required|string',
        'annual_income'=>'required|string',
        'occupation'=>'required|string',
        'family_type'=>'required',
        'manglik'=>'required',
    ]);
    $data['name'] = $data['first_name'].' '.$data['last_name'];
    $user = User::create($data);
    return redirect()->route('users.partner_preferences.create', ['user'=> $user->id]);
  }
}
