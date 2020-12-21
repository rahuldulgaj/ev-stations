<div>
    <div class="form-group row">
    
        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
        <div class="col-md-6">
        <select wire:model="selectedCountry" class="form-control"  name="country_id">
                <option value="" selected>Choose Country</option>
                @foreach($countries as $country)
            @if(!empty($city))
            <option value="{{$country->id}}" {{ $country->id == $city->country_id ? 'selected' : '' }}>
               {{$country->name}} </option>
                @else
                <option value="{{$country->id}}"  >{{$country->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>

    @if (!is_null($selectedCountry))
        <div class="form-group row">
            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

            <div class="col-md-6">
                <select wire:model="selectedState" class="form-control" name="state_id">
                    <option value="" selected>Choose state</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

 
</div>