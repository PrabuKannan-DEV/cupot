<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Prabu Kannan',
            'email' => 'prabu@cupid.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'first_name' =>'Prabu',
            'last_name'=>'Kannan',
            'dob' => '1995-09-08',
            'gender' => 'Male',
            'annual_income' => 10000,
            'occupation' => 'Private Job',
            'family_type' => 'Nuclear Family',
            'manglik' => 'No',
            'is_admin' => 1
        ]);
        User::factory()->count(500)->create();
    }
}
