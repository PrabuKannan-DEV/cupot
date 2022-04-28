@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-header bg-white" style="padding:50px;">
                            @include('reports.partials.form')
                </div>

                @component('partials.results', [ 'results' => $results, 'count' => $count])
                @endcomponent
            </div>
        </div>
    @endsection
