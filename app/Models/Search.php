<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Search extends Model
{
    use HasFactory;

    public static function basicSearch($input, $user_id)
    {
        $query = DB::table('users')
        ->select(
            'users.*'
        )
        ->where('id', '!=', $user_id);
        $user = User::find($user_id);
        if (!$user->is_admin) {
            $query->where('gender', $user->gender == 'Male' ? 'Female' : 'Male');
        }
        $count = $query->count();
        $results = $query->get();
        $results = Self::getScores($results, $input);
        return [$results, $count];
    }


    private static function getScores($results, $input)
    {
        $input_params = collect($input)->forget(['page', 'id', 'user_id', 'created_at', 'updated_at']);
        $params_count = count($input_params);
        $individual_score = 100/($params_count==0?1:$params_count);
        $results->map(function($result) use ($input, $individual_score){
            $result->score = 0;

            if (isset($input['age_range']) and $input['age_range'] != '') {
                [$from, $to] = explode('-',  $input['age_range']);
                $result_age = Carbon::parse($result->dob)->diffInYears();
                if ($result_age > $from and $result_age < $to) {
                    $result->score += $individual_score;
                }
            }

            if (isset($input['annual_income_range']) and $input['annual_income_range'] != '') {
                [$from, $to] = explode('-',  $input['annual_income_range']);
                if ($result->annual_income > $from and $result->annual_income < $to) {
                    $result->score += $individual_score;
                }
            }
            if (isset($input['occupation']) and $input['occupation'] != '') {
                $query_param = is_array($input['occupation']) ? $input['occupation'] : [$input['occupation']];
                if (in_array($result->occupation, $query_param)) {
                    $result->score += $individual_score;
                }
            }

            if (isset($input['family_type']) and $input['family_type'] != '') {
                $query_param = is_array($input['family_type']) ? $input['family_type'] : [$input['family_type']];
                if (in_array($result->family_type, $query_param)) {
                    $result->score += $individual_score;
                }
            }

            if (isset($input['manglik']) and $input['manglik'] != '' and $result->manglik == $input['manglik']) {
                $result->score += $individual_score;
            }

            if (isset($input['gender']) and $input['gender'] != '' and $result->gender == $input['gender']) {
                $result->score += $individual_score;
            }

            return $result;
        });
        return $results;
    }
}
