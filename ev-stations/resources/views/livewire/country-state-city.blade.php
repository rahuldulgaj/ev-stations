    <div>
    
    <div class="form-group row">
        <label for="country" class="col-sm-3 text-right control-label col-form-label">{{ __('Country') }}</label>
        <div class="col-sm-9">

            <select wire:model="selectedCountry" class="form-control"  name="country_id">
                <option value="" selected>Choose Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if (!is_null($selectedCountry))
        <div class="form-group row">
            <label for="state" class="col-sm-3 text-right control-label col-form-label">{{ __('State') }}</label>

            <div class="col-sm-9">

                <select wire:model="selectedState"   class="form-control" name="state_id">
                    <option value="" selected>Choose state</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    @if (!is_null($selectedState))
        <div class="form-group row">
            <label for="city" class="col-sm-3 text-right control-label col-form-label">{{ __('City') }}</label>

            <div class="col-sm-9">

                <select class="form-control" name="city_id">
                    <option value="" selected>Choose city</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>
