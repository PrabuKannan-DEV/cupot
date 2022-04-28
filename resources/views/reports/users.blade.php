@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @include('reports.partials.form')
                    </div>
                </div>

                @component('partials.results', [ 'results' => $results, 'count' => $count])
                @endcomponent
            </div>
        </div>
    @endsection
