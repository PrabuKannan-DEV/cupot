<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jobs\PopulatePartnerPreferenceJob;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        PopulatePartnerPreferenceJob::dispatch();
        $user = Auth::user();
        [$results, $count] = Search::basicSearch($user->partnerPreference, $user->id);
        return view('home', compact('user', 'results', 'count'));
    }
}
