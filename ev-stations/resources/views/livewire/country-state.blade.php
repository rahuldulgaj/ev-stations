<div>
          
<div class="form-group row">

        <label class="col-sm-3 text-right inline-block w-32 font-bold">Country</label>
        <select name="country_id" wire:model="country" class="col-sm-9 form-control ">
            <option value=''>Choose a Country</option>
            @foreach($countries as $country)
                <option value={{ $country->id }}>{{ $country->name }}</option>
            @endforeach
        </select>
    </div>

    
    @if(count($states) > 0)
    <div class="form-group row">
            <label class="col-sm-3 text-right inline-block w-32 font-bold">State</label>
            <select name="state_id" wire:model="state" class="col-sm-9 form-control ">
                <option value=''>Choose a State</option>
                @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
            </select>
        </div>
    @endif
</div>