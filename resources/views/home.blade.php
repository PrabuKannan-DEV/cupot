@extends('layouts.app')
@section('title', 'Cupid | Home')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-content-center bg-dark text-white">
                        <div class="h2">
                            {{ $user->name }}
                            <i class="fa-solid fa-mars mt-n3 p-3" data-toggle="tooltip" title="{{ $user->gender }}"><img
                                    src="
                                    @if ($user->gender == 'Male') /img/male.png
                            @else
                            /img/female.png @endif
                                    " alt="" style="height: 30px; width:30px;"></i>
                        </div>
                        <div class="">
                            @if ($user->partnerPreference != null)
                                <a class="btn btn-primary"
                                    href="{{ route('users.partner_preferences.create', ['user' => $user, 'mode' => 'edit', 'logged_in' => true]) }}">Update
                                    Partner Preferences</a>
                            @else
                                <a class="btn btn-primary"
                                    href="{{ route('users.partner_preferences.create', ['user' => $user, 'mode' => 'create', 'logged_in' => true]) }}">Partner
                                    Preferences</a>
                            @endif
                        </div>
                    </div>

                    <div class="card-body px-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="p-3 col-6 d-flex">
                                <strong class="col-6">Age</strong>
                                <div>{{ Carbon\Carbon::parse($user->dob)->diffInYears() }} Years</div>
                            </div>
                            <div class="p-3 col-6 d-flex">
                                <strong class="col-6">Occupation</strong>
                                <div class="col-md-6">{{ $user->occupation }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="p-3 col-6 d-flex">
                                <strong class="col-6">Annual Income</strong>
                                <div class="col-md-6">{{ '₹ ' . $user->annual_income }} </div>
                            </div>
                            <div class="p-3 col-6 d-flex">
                                <strong class="col-6">Family Type</strong>
                                <div class="col-md-6">{{ $user->family_type }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="p-3 col-6 d-flex">
                                <strong class="col-6">Manglik</strong>
                                <div class="col-md-6">{{ $user->manglik }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (!$user->partnerPreference)
                    <div class="text-center alert alert-warning">
                        <span>Update your partner preferences <a
                                href="{{ route('users.partner_preferences.create', ['user' => $user, 'mode' => 'create', 'logged_in' => true]) }}">here</a>
                            to get more suitable matches!</span>
                    </div>
                @endif
                @component('partials.results', ['results' => $results, 'count' => $count])
                @endcomponent
            </div>
        </div>
    @endsection
