<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Country;
use App\City;
use App\State;


class CountryState extends Component
{
    public $countries;
    public $states;
    public $cities;
 


    public $selectedCountry = NULL;
    public $selectedState = NULL;

    public function mount()
    {
        $this->countries = Country::all();
        $this->states = collect();
        $this->cities = collect();
      
    }

    public function render()
    {
        if(!empty($this->country)) {
            $this->cities = City::where('country_id', $this->country)->get();
        }
        return view('livewire.country-state');
    }

    public function updatedSelectedCountry($country)
    {
        $this->states = State::where('country_id', $country)->get();
        $this->selectedState = NULL;
    }

    // public function updatedSelectedState($state)
    // {
    //     if (!is_null($state)) {
    //         $this->cities = City::where('state_id', $state)->get();
    //     }
    // }
    
}
