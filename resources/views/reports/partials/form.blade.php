<form action="{{ route('reports.users') }}" method="GET">
    <div class="form-group row">
        <div class="mb-3 col-6">
            <div class="mb-3 col-6">
                <label class="form-label h5" for="age">Age</label>
                <input required type="text" name="age_range" id="age_range" readonly
                    style="border:0; color:#f6931f; font-weight:bold;" class=" @error('manglik') is-invalid @enderror">
                <div id="age-slider-range"></div>
                @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 col-6">
            <label for="gender" class="form-label h5">Gender
                <div class="form-check">
                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender"
                        value="Male" id="gender_male" @if (isset($input['gender']) and $input['gender'] == 'Male') checked @endif>
                    <label class="form-check-label h6" for="gender_male">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender"
                        value="Female" id="gender_female">
                    <label class="form-check-label h6" for="gender_female"
                        @if (isset($input['gender']) and $input['gender'] == 'Female') checked @endif>
                        Female
                    </label>
                </div>
            </label>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    @include('partials.filters')
    <button type="submit" class="btn btn-primary">Search</button>
</form>
<script>
    $(function() {
        [from, to] = "{{ $input['age_range'] ?? '25-35' }}".split('-')
        $("#age-slider-range").slider({
            range: true,
            min: 18,
            max: 80,
            values: [from, to],
            slide: function(event, ui) {
                $("#age_range").val(ui.values[0] + " - " + ui.values[1]);
            }
        });
        $("#age_range").val($("#age-slider-range").slider("values", 0) +
            " - " + $("#age-slider-range").slider("values", 1));
    });
</script>
