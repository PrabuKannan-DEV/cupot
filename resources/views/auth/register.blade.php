@extends('layouts.app')
@section('title', 'Cupid | Register')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <form method="POST" action="{{ route('register') }}">
                                @if ($errors->any())
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                @endif
                                @csrf
                                <div class="row mb-3">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name </label>
                                    <div class="col-md-6">
                                        <input type="text" name="first_name"
                                            class="form-control @error('first_name') is-invalid @enderror" id="first_name">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                            id="last_name" name="last_name">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="dob" class="col-md-4 col-form-label text-md-end">DOB </label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob"
                                            name="dob">
                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="gender" class="col-md-4 col-form-label text-md-end">Gender</label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input @error('gender') is-invalid @enderror"
                                                type="radio" name="gender" value="Male" id="gender_male">
                                            <label class="form-check-label" for="gender_male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('gender') is-invalid @enderror"
                                                type="radio" name="gender" value="Female" id="gender_female" checked>
                                            <label class="form-check-label" for="gender_female">
                                                Female
                                            </label>
                                        </div>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="annual_income" class="col-md-4 col-form-label text-md-end">Annual
                                        Income</label>
                                    <div class="col-md-6">
                                        <input type="text" name="annual_income" id="annual_income"
                                            class="form-control @error('annual_income') is-invalid @enderror">
                                        {{-- <input type="text"  id="annual_income_ramge" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                      <div id="slider-range"></div> --}}
                                        @error('annual_income')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="exampleInputPassword1"
                                        class="col-md-4 col-form-label text-md-end">Occupation</label>
                                    <div class="col-md-6">
                                        <select name="occupation" id="occupation"
                                            class="form-control @error('occupation') is-invalid @enderror">
                                            <option value="" disabled selected>Select</option>
                                            <option value="Private Job">Private Job</option>
                                            <option value="Government Job">Government Job</option>
                                            <option value="Business">Business</option>
                                        </select>
                                        @error('occupation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="family_type" class="col-md-4 col-form-label text-md-end">Family Type</label>
                                    <div class="col-md-6">
                                        <select name="family_type" id="family_type"
                                            class="form-control @error('family_type') is-invalid @enderror">
                                            <option value="" disabled selected>Select</option>
                                            <option value="Joint Family">Joint Family</option>
                                            <option value="Nuclear Family">Nuclear Family</option>
                                        </select>
                                        @error('family_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="manglik" class="col-md-4 col-form-label text-md-end">Manglik</label>
                                    <div class="col-md-6">
                                        <select name="manglik" id="manglik" class="form-control">
                                            <option value="" disabled selected>Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        @error('manglik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="row d-flex justify-content-around">
                            <div class="col-4">
                                <a href="/auth/google/redirect" class="btn btn-light border-dark">
                                    <img src="/img/google.png" style="height: 30px;width:30px;"></img>
                                    Sign up with google</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
