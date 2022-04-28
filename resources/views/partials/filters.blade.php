<div class="form-group row">
    <div class="mb-3 col-6">
        <label for="occupation" class="form-label">Occupation</label>
        <select @if (url()->current() != route('reports.users')) required @endif name="occupation[]" id="occupation"
            class="form-control @error('occupation') is-invalid @enderror" multiple="multiple">
            <option value="Private Job" @if (isset($input['occupation'])and(in_array('Private Job', is_array($input['occupation']) ? $input['occupation'] : [$input['occupation']]))) selected @endif>Private Job</option>
            <option value="Government Job" @if (isset($input['occupation']) and in_array('Government Job', is_array($input['occupation']) ? $input['occupation'] : [$input['occupation']])) selected @endif>Government Job</option>
            <option value="Business" @if (isset($input['occupation']) and in_array('Business', is_array($input['occupation']) ? $input['occupation'] : [$input['occupation']])) selected @endif>Business</option>
        </select>

        @error('occupation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-6">
        <label for="family_type" class="form-label">Family Type</label>
        <select @if (url()->current() != route('reports.users')) required @endif name="family_type[]" id="family_type"
            class="form-control  @error('family_type') is-invalid @enderror" multiple="multiple">
            <option @if (isset($input['family_type']) and in_array('Joint Family', is_array($input['family_type']) ? $input['family_type'] : [$input['family_type']])) selected @endif value="Joint Family">Joint</option>
            <option @if (isset($input['family_type']) and in_array('Nuclear Family', is_array($input['family_type']) ? $input['family_type'] : [$input['family_type']])) selected @endif value="Nuclear Family">Nuclear</option>
        </select>
        @error('family_type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="mb-3 col-6">
        <label for="annual_income">Annual Income ₹ </label>
        <input @if (url()->current() != route('reports.users')) required @endif type="text" name="annual_income_range"
            id="annual_income_range" readonly style="border:0; color:#f6931f; font-weight:bold;"
            class=" @error('manglik') is-invalid @enderror">
        <div id="slider-range"></div>
        @error('annual_income')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3 col-6">
        <label for="exampleInputPassword1" class="form-label">Manglik</label>
        <select @if (url()->current() != route('reports.users')) required @endif name="manglik" id="manglik"
            class="form-control @error('manglik') is-invalid @enderror">
            <option value="" disabled selected>Select</option>
            <option @if (isset($input['manglik']) and $input['manglik'] == 'Yes') selected @endif value="Yes">Yes</option>
            <option @if (isset($input['manglik']) and $input['manglik'] == 'No') selected @endif value="No">No</option>
        </select>
        @error('manglik')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
