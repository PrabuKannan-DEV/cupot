<div class="card-header h5 mt-5">
    {{ $count . ' ' }}Matches
</div>
<div class="card-body">
    @foreach ($results->sortByDesc('score') as $result)
        <div class="card m-4">
            <div class="card-header p-3 d-flex justify-content-between">
                <div class="h4">
                    {{ $result->name }},
                    <small>{{ Carbon\Carbon::parse($result->dob)->diffInYears() . 'Yrs' }}</small>
                    <i class="fa-solid fa-mars mt-n3 p-3" data-toggle="tooltip" title="{{ $result->gender }}"><img src="
                        @if ($result->gender == 'Male') /img/male.png
                    @else
                    /img/female.png @endif
                        " alt="" style="height: 30px; width:30px;"></i>
                </div>
                <div class="">
                    Matching {{ $result->score }}%
                </div>
            </div>
            <div class="card-body p-3" style="border-radius: 5px;">
                <div class="row">
                    <div class="col-8">
                        <div class="p-3">
                            Occupation : {{ $result->occupation }}
                        </div>
                        <div class="p-3">
                            Family Type : {{ $result->family_type }}
                        </div>
                        <div class="p-3">
                            Manglik : {{ $result->manglik }}
                        </div>
                        <div class="p-3">
                            Annual Income : ₹ {{ $result->annual_income }}
                        </div>
                    </div>
                    <div class="col-4 position-relative">
                        <img src="{{ $result->gender == 'Male' ? '/img/male-avatar.jpeg' : '/img/female-avatar.jpeg' }}"
                            alt="{{ $result->gender . ' Picture' }}" style="width:250px;height:250px;position:relative; padding:10px;">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- {{ $results->links() }} --}}
</div>
