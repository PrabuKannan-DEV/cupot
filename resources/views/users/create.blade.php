@extends('layouts.app')
@section('title', 'New Profile')

@section('content')
    <div class="container p-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2>
                    New Profile
                </h2>
            </div>
            <div class="card-body  p-5">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="mb-3 col-6">
                            <label for="first_name" class="form-label">First Name
                                <input type="text" name="first_name"
                                    class="form-control @error('first_name') is-invalid @enderror" id="first_name">
                            </label>
                            @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="last_name" class="form-label">Last Name
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    id="last_name" name="last_name">
                            </label>
                            @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-6">
                            <label for="dob" class="form-label">DOB
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob"
                                    name="dob">
                            </label>
                            @error('dob')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="gender" class="form-label">Gender
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                        name="gender" value="Male" id="gender_male">
                                    <label class="form-check-label" for="gender_male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                        name="gender" value="Female" id="gender_female" checked>
                                    <label class="form-check-label" for="gender_female">
                                        Female
                                    </label>
                                </div>
                            </label>
                            @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-6">
                            <label for="annual_income">Annual Income ₹</label>
                            <input type="text" name="annual_income" id="annual_income"
                                class="form-control @error('annual_income') is-invalid @enderror">
                                    {{-- <input type="text"  id="annual_income_ramge" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                  <div id="slider-range"></div> --}}
                            @error('annual_income')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="exampleInputPassword1" class="form-label">Occupation
                                <select name="occupation" id="occupation"
                                    class="form-control @error('occupation') is-invalid @enderror">
                                    <option value="" disabled selected>Select</option>
                                    <option value="Private Job">Private Job</option>
                                    <option value="Government Job">Government Job</option>
                                    <option value="Business">Business</option>
                                </select>
                            </label>
                            @error('occupation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mb-3 col-6">
                            <label for="family_type" class="form-label">Family Type
                                <select name="family_type" id="family_type"
                                    class="form-control @error('family_type') is-invalid @enderror">
                                    <option value="" disabled selected>Select</option>
                                    <option value="Joint Family">Joint Family</option>
                                    <option value="Nuclear Family">Nuclear Family</option>
                                </select>
                            </label>
                            @error('family_type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="manglik" class="form-label @error('manglik') is-invalid @enderror">Manglik
                                <select name="manglik" id="manglik" class="form-control">
                                    <option value="" disabled selected>Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </label>
                            @error('manglik')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="mb-3 col-6">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password">
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save and Continue...</button>
                </form>
            </div>
        </div>
    </div>
@stop
