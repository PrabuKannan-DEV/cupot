<?php

namespace App\Models;

use App\Models\PartnerPreference;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'email',
        'password',
        'dob',
        'gender',
        'annual_income',
        'occupation',
        'family_type',
        'manglik',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected static function boot(){
    //     parent::boot();

    //     self::created(function($model){
    //         $model->partnerPreference()->create();
    //     });
    // }

    public function partnerPreference()
    {
        return $this->hasOne(PartnerPreference::class, 'user_id');
    }
}
