<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use App\Models\PartnerPreference;
use App\Jobs\PopulatePartnerPreferenceJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    $this->call(UserSeeder::class);
        PopulatePartnerPreferenceJob::dispatch();
        // \App\Models\User::factory(10)->create();
    }
}
