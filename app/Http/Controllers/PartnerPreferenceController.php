<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerPreferenceController extends Controller
{
    public function create(Request $request, User $user)
    {
        $mode = $request->mode;
        $input = $user->partnerPreference;
        $logged_in = $request->logged_in ?? false;
        return view('partner_preferences.create', compact('user', 'mode', 'input', 'logged_in'));
    }

    public function store(Request $request, User $user)
    {
        $data = $this->getData($request, $user);
        $logged_in = $request->logged_in;
        $input = $request->all();
        if ($logged_in == 1) {
            return redirect()->route('home')->with('alert-success', 'success');
        }
        Auth::logout();
        return redirect()->route('login')->with('alert-success', 'success');
    }

    public function update(Request $request, User $user)
    {
        $data = $this->getData($request, $user  );
        return redirect()->route('home')->with('alert-success', 'success');
    }

    private function getData(Request $request, User $user)
    {
        $data = $request->validate([
            'occupation' => 'required',
            'family_type' => 'required',
            'annual_income_range' => 'required',
            'manglik' =>'required'
        ]);
        $data['occupation'] = join(', ', $data['occupation']);
        $data['family_type'] = join(', ', $data['family_type']);
        $user->partnerPreference()->updateOrCreate(['user_id'=>$user->id],$data);
    }
}
