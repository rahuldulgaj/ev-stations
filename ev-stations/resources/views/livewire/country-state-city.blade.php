    <div>
    
    <div class="form-group row">
    <label class="col-sm-3 text-right inline-block w-32 font-bold">Country</label>
    <div class="col-sm-9">
        <select name="country_id" wire:model="country" class="form-control ">
            <option value=''>Choose a Country</option>
            @foreach($countries as $country)
                <option value={{ $country->id }}>{{ $country->name }}</option>
            @endforeach
        </select>
        </div>
    </div>
 
    @if(count($states)  > 0)
   
        <div class="form-group row">
        <label class="col-sm-3 text-right inline-block w-32 font-bold">State</label>
            <div class="col-sm-9">

                <select wire:model="state"   class="form-control" name="state_id">
                    <option value="" selected>Choose state</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    @if (count($cities) > 0)
        <div class="form-group row">
        <label class="col-sm-3 text-right inline-block w-32 font-bold">City</label>
            <div class="col-sm-9">

                <select class="form-control" name="city_id" wire:model="city" >
                    <option value="" selected>Choose city</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>
