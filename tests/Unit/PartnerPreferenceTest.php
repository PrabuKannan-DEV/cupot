<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PartnerPreferenceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPartnerPreferenceCanBeSavedForAProfile()
    {
        $user = User::factory()->create();
        $user->partnerPreference()->create([
            'annual_income_range' => '$30K to $50K',
            'family_type' => 'Joint Family,Nuclear Family',
            'occupation' => 'Private Job,Government Job,Business',
            'manglik' => 'Yes'
        ]);
        $preference = $user->partnerPreference;
        $this->assertEquals('$30K to $50K', $preference->annual_income_range);
        $this->assertEquals('Joint Family,Nuclear Family', $preference->family_type);
        $this->assertEquals('Private Job,Government Job,Business', $preference->occupation);
        $this->assertEquals('Yes', $preference->manglik);
    }
}
