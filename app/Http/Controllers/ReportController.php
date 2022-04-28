<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function userReport(Request $request)
    {
        $this->authorize('viewReports', [User::class]);
        $input = $request->all();
       [$results, $count ]= Search::basicSearch($input, Auth::user()->id);
        return view('reports.users', compact('results', 'count', 'input'));
    }
}
