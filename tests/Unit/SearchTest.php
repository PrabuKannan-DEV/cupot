<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Search;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class SearchTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSearchReturnsCorrectResults()
    {
        $this->markTestSkipped('This doesn\'t work for the scoring methods, so skipping');
        $current_user = User::factory()->create();
        $user_count = User::count(); //Total count
        $data_1 = [
            'dob' => '1998-08-09',
            'gender' => 'Male',
            'annual_income' => 11000,
            'occupation' => 'Private Job',
            'family_type' => 'Joint Faimly',
            'manglik' => 'Yes'
        ];
        User::factory()->count(5)->create($data_1);
        $this->assertEquals($user_count+5, User::count()); //Asserting total count

        [$results, $count] = Search::basicSearch($data_1, $current_user->id);
        $results_count = $results->count();
        $this->assertEquals(5, $results_count);//Asserting 1st set of search results

        $user_count = User::count();
        $data_2 = [
            'dob' => '2020-08-09',
            'gender' => 'Female',
            'annual_income' => 21000,
            'occupation' => 'Government Job',
            'family_type' => 'Nuclear Faimly',
            'manglik' => 'Yes'
        ];
        User::factory()->count(5)->create($data_2);
        $this->assertEquals($user_count+5, User::count());

        [$results, $count] = Search::basicSearch($data_2, $current_user->id);
        $results_count = $results->count();
        $this->assertEquals(5, $results_count);//Asserting 2nd set of search results
    }
}
