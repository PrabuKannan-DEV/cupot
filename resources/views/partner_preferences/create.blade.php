@extends('layouts.app')
@section('title', 'New Profile')

@section('content')
    <div class="container p-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2>
                    What are your partner preferences {{ $user->name }}?
                </h2>
            </div>
            <div class="card-body  p-5">
                <form action="{{ route('users.partner_preferences.'.($mode=="create"?"store":"update"), ['user'=> $user, 'partner_preference'=>isset($user->partnerPreference)?$user->partnerPreference->id:null, 'mode'=>$mode]) }}" method="POST">
                    @if ($mode == 'edit')
                        @method('PUT')
                    @endif
                    @csrf
                   @include('partials.filters')
                    <button type="submit" class="btn btn-primary">Save and Continue...</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var Utils = $.fn.select2.amd.require('select2/utils');
        var Dropdown = $.fn.select2.amd.require('select2/dropdown');
        var DropdownSearch = $.fn.select2.amd.require('select2/dropdown/search');
        var CloseOnSelect = $.fn.select2.amd.require('select2/dropdown/closeOnSelect');
        var AttachBody = $.fn.select2.amd.require('select2/dropdown/attachBody');

        var dropdownAdapter = Utils.Decorate(Utils.Decorate(Utils.Decorate(Dropdown, DropdownSearch), CloseOnSelect),
            AttachBody);

        $('.multiselect').select2({
            ...
            dropdownAdapter: 'dropdownAdapter',
            minimumResultsForSearch: 0,
            ...
        }).on('select2:opening select2:closing', function(event) {
            //Disable original search (https://select2.org/searching#multi-select)
            var searchfield = $(this).parent().find('.select2-search__field');
            searchfield.prop('disabled', true);
        });

    </script>
    <script>
        $( function() {
        [from, to] = "{{$input['annual_income_range'] ?? "20000-90000"}}".split('-')
          $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 100000,
            values: [ from, to ],
            slide: function( event, ui ) {
              $( "#annual_income_range" ).val(  ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            }
          });
          $( "#annual_income_range" ).val( $( "#slider-range" ).slider( "values", 0 ) +
            " - " + $( "#slider-range" ).slider( "values", 1 ) );
        } );
        </script>
@stop
